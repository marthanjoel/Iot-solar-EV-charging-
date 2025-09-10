import tkinter as tk
import random

root = tk.Tk()
root.title("Solar EV Charging Status")
root.geometry("400x200")

solar_status = tk.StringVar()
solar_status.set("Unknown")

status_label = tk.Label(root, text="Solar Energy Availability:", font=("Arial", 14))
status_label.pack(pady=10)

value_label = tk.Label(root, textvariable=solar_status, font=("Arial", 16, "bold"))
value_label.pack(pady=10)

def update_solar_status():
    # Randomly simulate solar energy availability
    solar_status.set(random.choice(["Low", "Medium", "High"]))
    root.after(5000, update_solar_status)  # update every 5 seconds

update_solar_status()
root.mainloop()  # <-- This is essential
