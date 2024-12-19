from reportlab.pdfgen import canvas
from reportlab.lib.pagesizes import A4
from reportlab.pdfbase import pdfmetrics
from reportlab.pdfbase.ttfonts import TTFont


phone = "seller6"
name_of_place = "seller"
sector = "seller"
building = "seller3333"
floar = "seller4444"
line = "seппппппппппппппппппппппппппппппп"
place = "seller"


canvas = canvas.Canvas("c", pagesize=A4)
pdfmetrics.registerFont(TTFont('FreeSans', 'FreeSans.ttf'))
canvas.setFont('FreeSans', 32)
canvas.drawString(10, 600, f"Телефон - {phone}")
canvas.drawString(10, 550, f"Торговая точка - {name_of_place}")
canvas.drawString(10, 500, f"Сектор - {sector}")
canvas.drawString(10, 450, f"Корпус - {building}")
canvas.drawString(10, 400, f"Этаж - {floar}")
canvas.drawString(10, 350, f"Ряд - {line}")
canvas.drawString(10, 300, f"Место - {place}")
canvas.showPage()
canvas.save()