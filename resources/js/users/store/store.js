export let store = {
    
    minimumStay: {
        options: ['Select', '1 night', '2 nights', '3 nights', '4 nights', '5 nights', '6 nights', '1 week', '2 weeks', '3 weeks', '1 month', '2 months', '3 months', '4 months', '5 months', '6 months', '7 months', '8 months', '9 months', '10 months', '11 months', '12 months']
    },
    buildingType: {
        options: ['Select', 'Apartment Building (1-10 units)', 'Apartment Building (10+ units)', 'Apartment Complex', 'House']
    },
    peopleInHousehold: {
        options: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
    },
    householdSex: {
        options: ['Select', 'Female', 'Male', 'Co-ed']
    },
    cleanliness: {
        options: ['Select', 'Clean', 'Average', 'Messy']
    },
    overnightGuests: {
        options: ['Select', 'Never', 'Rarely', 'Occasionally', 'Often']
    },
    partyHabits: {
        options: ['Select', 'Rarely', 'Occasionally', 'Weekends', 'Daily']
    },
    getUp: {
        options: ['Select', 'Before 6AM', '6AM - 8AM', '8AM - 10AM', '10AM - 12AM', 'After 12AM']
    },
    goToBed: {
        options: ['Select', 'Before 8PM', '8PM - 10PM', '10PM - 12AM', '12AM - 2AM', 'After 2AM']
    },
    foodPreference: {
        options: ['Select', 'Almost Anything', 'Fish Only', 'Vegetarian', 'Vegan', 'Kosher']
    },
    smoker: {
        options: ['Select', 'No', 'Yes', 'Outside Only']
    },
    workSchedule: {
        options: ['Select', 'Professional (9-5)', 'Student', 'Work at Night', 'Work at Home', 'Mixed']
    },
    occupation: {
        options: ['Select', 'Accounting', 'Administration/Secretarial', 'Advertising', 'Architecture/Design', 'Automotive/Mechanical', 'Aviation/Aeronautical', 'Beauty/Fashion', 'Biology/Life Science', 'Broadcasting/Publishing', 'Consulting', 'Customer Service/Support', 'Creative/Media', 'Education/Tranining', 'Engineering', 'Finance/Banking', 'Government/Social Service', 'Health Services', 'Hospitality', 'Human Resource/Recruiting', 'IT/Computers', 'Insurance', 'Internet/Media', 'Law Enforcement/Security', 'Legal', 'Manufacturing/Production', 'Marketing/Public Relations', 'Military', 'Non-Profit', 'Other', 'Physical Science/Environment', 'Real Estate', 'Retail', 'Sales', 'Sports/Fitness', 'Student/Graduate', 'Student/Undergraduate', 'Telecommunications', 'Trades/Labor', 'Transportation/Logistic']
    },
    preferSmoker: {
        options: ['Select', 'No', 'Yes', 'Outside Only']
    },
    apartmentAmenities: [
        { name: 'High-rise' },
        { name: 'Low-rise' },
        { name: 'Disability Access' },
        { name: 'Doorman' },
        { name: 'Walkup' },
        { name: 'Health Club' },
        { name: 'Laundromat' },
        { name: 'Covered Parking' },
        { name: 'Elevator' },
        { name: 'Garage' },
        { name: 'Parking Lot' },
        { name: 'Street Parking' },
        { name: 'Near Bus Stop' },
        { name: 'Near Subway' },
        { name: 'Electronic Security' },
        { name: 'Security' },
        { name: 'Swimming Pool' },
        { name: 'Internet' },
        { name: 'Wireless Internet' },
    ],
    amenities: [
        { name: 'Air Conditioning' },
        { name: 'Deck or Patio' },
        { name: 'Wood Floors' },
        { name: 'Yard' },
        { name: 'Carpet' },
        { name: 'Storage' },
        { name: 'Gym' },
        { name: 'Parking' },
        { name: 'Elevator' },
        { name: 'Fireplace' },
        { name: 'Laundry' },
        { name: 'Tennis' },
        { name: 'Jacuzzi' },
        { name: 'Dishwasher' },
        { name: 'Pool' },
        { name: 'Private Bathroom' },
        { name: 'Phone Jack' },
        { name: 'Private Entrance' },
        { name: 'Cable TV Jack' },
        { name: 'Private Closet' },
        { name: 'Internet' },
        { name: 'Wireless Internet' },
    ],
    pets: [
        { name: 'Cats' },
        { name: 'Dogs' },
        { name: 'Small Pets' },
        { name: 'Birds' },
        { name: 'Fish' },
        { name: 'Reptiles' }
    ],

    bedroom: {
        options: ['Studio', '1 bedroom', '2 bedrooms', '3 bedrooms', '4 bedrooms', '5 bedrooms']
    },
    bathroom: {
        options: ['1', '1.5', '2', '2.5', '3', '3.5+']
    },
    measurementUnit: {
        options: ['Square meter', 'Square feet']
    },
    apartmentTypes: [
        { name: 'Studio' },
        { name: '1 Bedroom' },
        { name: '2 Bedrooms' },
        { name: '3 Bedrooms' },
        { name: '4 Bedrooms' },
        { name: '5 Bedrooms' }
    ],


}