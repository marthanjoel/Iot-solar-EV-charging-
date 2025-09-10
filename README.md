# 🌞 Solar EV Charging IoT System

🚗🔋 **An IoT-powered smart solar EV charging system with real-time monitoring, booking, and payment integration.**

---

## 📌 Project Overview
The **Solar EV Charging IoT System** is a smart and energy-efficient solution for electric vehicle (EV) charging powered by solar energy. It integrates IoT technology for **real-time monitoring, automated charging, and user booking**, ensuring efficient energy usage and convenience.

**Key Features:**
- ⚡ **Smart Charging** – Automated charging based on solar availability  
- 🌐 **IoT Integration** – ESP32 microcontroller for real-time monitoring  
- 📅 **Booking System** – Web interface for EV charging slot reservations  
- 📱 **Remote Monitoring** – Tkinter GUI simulation & mobile-friendly web interface  
- 🔒 **Secure Authentication** – User login and admin panel  
- 🌱 **Energy Efficiency** – Optimized solar power utilization  



---

## 🛠 Setup Steps
1. **Clone the Repository**

git clone https://github.com/marthanjoel/Solar-EV-Charging-IoT-System.git
cd Solar-EV-Charging-IoT-System
Setup the Database

Import database.sql into MySQL

Update db.php with your database credentials

Upload Code to ESP32

Configure WiFi credentials and API endpoints

Run the Web Application
php -S localhost:8000
Run the Tkinter Simulation GUI
python3 app.py
The GUI simulates solar energy availability and charging slot status.

--

🧩 How the Simulation Works
Tkinter GUI updates solar energy availability every 5 seconds

EV slots are displayed as interactive buttons

Charging starts automatically if solar conditions are sufficient

Real-time status and alerts are simulated for testing
<img width="1366" height="768" alt="Screenshot from 2025-09-10 16-31-13" src="https://github.com/user-attachments/assets/525a7286-fee0-4eba-b441-e23230279f8e" />




---
🔌 Sensors / Devices Emulated
☀ Solar Panels – Simulated solar energy availability

🖥 ESP32 Microcontroller – Real-time data monitoring

🚗 EV Charging Slots – Simulated booking slots in Tkinter GUI

⚠ Challenges Faced
Integrating IoT sensor data with a web-based booking system

Simulating solar energy availability without actual hardware

Ensuring real-time GUI updates and responsiveness

Handling concurrent EV bookings and automated charging logic


--

💡 Future Improvements
Integrate live MQTT communication between ESP32 and Tkinter GUI

Display real-time solar energy graphs in the GUI

Add payment gateway integration for automated billing

Mobile app support for remote monitoring & booking

Notifications/alerts for charging completion or low solar availability

Optimize GUI design with interactive visual dashboards

Add AI-based prediction for solar energy availability and optimal charging schedules

--

🖥 Technologies Used
ESP32 / NodeMCU – IoT microcontroller

Solar Panels – Renewable energy source (simulated)

PHP & MySQL – Backend for booking management

HTML, CSS, Bootstrap – Web interface

Firebase / MQTT – Real-time updates (optional)

Python (Tkinter) – Simulation GUI


--
👤 Author
LUTWAMA JOEL MARTHAN
📧 Email: lutwamajoelmarthan@gmail.com

