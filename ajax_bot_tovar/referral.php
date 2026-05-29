<?php
// ajax_bot_tovar/referral.php
header('Access-Control-Allow-Origin: *');


// Параметры подключения к базе данных
$host     = getenv("DB_HOST")     ?: "localhost";
$dbname   = getenv("DB_NAME")     ?: "botTovar";
$user     = getenv("DB_USER")     ?: "postgres";
$password = getenv("DB_PASSWORD") ?: "";
$port     = getenv("DB_PORT")     ?: "5432";


$db = pg_connect("host=$host dbname=$dbname user=$user password=$password port=$port");
if (!$db) {
    echo json_encode(['error' => 'Ошибка подключения к базе данных.']);
    exit;
}

// Получаем GET-параметр hash, если он нужен для фильтрации (по необходимости)
$user_id = isset($_GET['user_id']) ? $_GET['user_id'] : null;
// Если требуется фильтрация по hash, можно добавить условие в запрос

// Выполняем запрос для получения всех записей
$query = "SELECT 
    r.id AS referral_id,
    r.user_id AS referral_user_id,
    r.link,
    r.referrer_id,
    r.points,
    r.group_points,
    r.sop,
    r.status,
    r.last_status,
    r.balance,
    r.potential_status,
    u.name AS user_name,
    COALESCE(
        JSONB_AGG(
            jsonb_build_object(
                'id', c.id,
                'user_id', c.user_id,
                'contacts', c.contacts,
                'contacts_type', c.contacts_type
            )
        ) FILTER (WHERE c.id IS NOT NULL), '[]'
    ) AS contacts
FROM referral r
LEFT JOIN users u ON r.user_id = u.user_id
LEFT JOIN contacts c ON r.user_id = c.user_id
GROUP BY r.id, u.name
ORDER BY r.user_id;
";
$result = pg_query($db, $query);
if (!$result) {
    echo json_encode(['error' => 'Ошибка выполнения запроса.']);
    exit;
}

// Получаем все строки (pg_fetch_all возвращает false, если записей нет)
$rows = pg_fetch_all($result);
if (!$rows) {
    $rows = [];
}

//Формируем массив узлов, где ключ – id узла
$items = [];

foreach ($rows as $row) {
    $id = (int)$row['referral_user_id'];
    // Если пользователь уже есть в массиве, обновляем данные
    if (!isset($items[$id])) {
        $items[$id] = [
            'id'          => $id,
            'userId'      => $id,
            'referrerId'  => (int)$row['referrer_id'],
            'name'        => $row['user_name'],
            'volume'      => isset($row['points']) ? (int)$row['points'] : 0,
            'groupVolume' => isset($row['group_points']) ? (int)$row['group_points'] : 0,
            'totalVolume' => isset($row['sop']) ? (int)$row['sop'] : 0,
            'status'      => $row['status'],
            'details'     => "Баланс: " . $row['balance'] . ", Последний статус: " . ($row['last_status'] ?? 'Неизвестно'),
            'contacts'    => [], // Контакты пользователя
            'children'    => [], // Для вложенных узлов 
        ];
    }

    if (!empty($row['contacts'])) {
        $contacts = json_decode($row['contacts'], true); // Декодируем JSON
        if (is_array($contacts)) {
            foreach ($contacts as $contact) {
                $items[$id]['contacts'][] = [
                    'id'           => (int)$contact['id'],
                    'userId'       => (int)$contact['user_id'],
                    'contact'      => $contact['contacts'],
                    'contactType'  => $contact['contacts_type']
                ];
            }
        }
    }
}

// Преобразуем в индексированный массив



// Строим древовидную структуру
$tree = [&$items[$user_id]];

foreach ($items as $id => &$node) {
    $parentId = $node['referrerId'];
    if (isset($items[$parentId]) && $parentId != $id) 
    {
        $items[$parentId]['children'][] = &$node;
    }
}

header('Content-Type: application/json');
// unset($node); // сбрасываем ссылку

// Выводим результат в формате JSON
echo json_encode($tree, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
