# Happy Chickhouse - server
Written in Laravel

# What it does
- Temperature
    - Receives (and stores) settings from the app - range of acceptable temperature
    - Receives (and stores) data from Arduino
    - Sends commands to control temperature to Arduino (red LED, fan)
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
    
# Models
- user - users and their keys
- humidity_data - data from Arduino about humidity
- temperature_data - data from Arduino about temperature
- temperature_setting - settings on when to start heating/AC
- sunlight_data - data from Arduino about sunlight amount
- opening_settings - settings on when to close/open the door (based on sunlight, time, chickenout)
- opening_fails - data about door failing to close/open
- chicken_entries - entries of chicken entering/leaving the house
- chicken_counts - current number of chicken in the house
- predator_data - info about predator breaches