# Smart Chicken server
Written in Laravel

# What it does
- Temperature
    - Receives (and stores) settings from the app - range of acceptable temperature
    - Receives (and stores) data from Arduino
    - Sends commands to control temperature to Arduino (red LED, door opening)
    - Sends settings to the app
- Humidity
    - Receives (and stores) data from Arduino
    - Sends data to the app
- Door opening
    - Receives (and stores) settings from the app - times, brightness
    - Receives (and stores) data from Arduino about openness and brightness
    - Sends commands to open/close the door to Arduino based on time, brightness and chicken count
    - Sends settings to the app
- Counting chickens
    - Receives (and stores) data from Arduino about chicken count - coming in or out
    - Sends data about chicken count to the app
- Predators
    - Receives (and stores) data from Arduino about predator breaches
    - Sends data about predator breaches to the app