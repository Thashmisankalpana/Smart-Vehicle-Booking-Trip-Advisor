import sys
try:
    import pandas as pd
except ImportError:
    print("Pandas library not found. Please make sure it is installed.")
    sys.exit(1)

def get_vehicle(q1, q2, q3, q4, q5):
    # Define the decision tree structure
    if q1 == "Yes":
        if q2 == "High":
            if q3 == "Long":
                return "Electric car"
            elif q3 == "Short":
                return "Hybrid car"
        elif q2 == "Low":
            if q5 == "No":
                return "Gasoline car"
            elif q5 == "Yes":
                return "Diesel car"
    elif q1 == "No":
        if q4 == "2-3 people":
            return "Motorcycle"
        elif q4 == "4-5 people":
            return "SUV"

    # If no suitable vehicle is found, return None
    return None
# Get the user's answers from command-line arguments
q1 = sys.argv[1]
q2 = sys.argv[2]
q3 = sys.argv[3]
q4 = sys.argv[4]
q5 = sys.argv[5]

# Call the get_vehicle function to process the answers and return the recommended vehicle
vehicle = get_vehicle(q1, q2, q3, q4, q5)

# Print the recommended vehicle to the console
print(vehicle)
