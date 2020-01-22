import a1 from '../assets/amenities/1.png';
import a2 from '../assets/amenities/2.png'
import a3 from '../assets/amenities/3.png'
import a4 from '../assets/amenities/4.png'
import a5 from '../assets/amenities/5.png'
import a6 from '../assets/amenities/6.png'
import a7 from '../assets/amenities/7.png'
import a8 from '../assets/amenities/8.png'
import a9 from '../assets/amenities/9.png'
import a10 from '../assets/amenities/10.jpg'
import a11 from '../assets/amenities/11.png'
import a12 from '../assets/amenities/12.png'
import a13 from '../assets/amenities/13.png'
import a14 from '../assets/amenities/14.png'
import a15 from '../assets/amenities/15.png'
import a16 from '../assets/amenities/16.png'
import a17 from '../assets/amenities/17.png'
import a18 from '../assets/amenities/18.png'
import a19 from '../assets/amenities/19.png'
import a20 from '../assets/amenities/20.png'
import a21 from '../assets/amenities/21.png'
import a22 from '../assets/amenities/22.png'
import a23 from '../assets/amenities/23.png'
import a24 from '../assets/amenities/24.png'
import a25 from '../assets/amenities/25.png'
import a26 from '../assets/amenities/26.png'
import a27 from '../assets/amenities/27.png'
import a28 from '../assets/amenities/28.png'
import a29 from '../assets/amenities/29.png'
import a30 from '../assets/amenities/30.png'
import a31 from '../assets/amenities/31.png'
import a32 from '../assets/amenities/32.png'
import a33 from '../assets/amenities/33.png'
import a34 from '../assets/amenities/34.png'
import a35 from '../assets/amenities/35.png'
import a36 from '../assets/amenities/36.png'
import a37 from '../assets/amenities/37.png'
import a38 from '../assets/amenities/38.png'

export const store = {
    
    minimumStay: {
        options: ['1 night', '2 nights', '3 nights', '4 nights', '5 nights', '6 nights', '1 week', '2 weeks', '3 weeks', '1 month', '2 months', '3 months', '4 months', '5 months', '6 months', '7 months', '8 months', '9 months', '10 months', '11 months', '12 months']
    },
    buildingType: {
        options: ['Apartment Building (1-10 units)', 'Apartment Building (10+ units)', 'Apartment Complex', 'House']
    },
    peopleInHousehold: {
        options: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
    },
    householdSex: {
        options: ['Female', 'Male', 'Co-ed']
    },
    cleanliness: {
        options: ['Clean', 'Average', 'Messy']
    },
    overnightGuests: {
        options: ['Never', 'Rarely', 'Occasionally', 'Often']
    },
    partyHabits: {
        options: ['Rarely', 'Occasionally', 'Weekends', 'Daily']
    },
    getUp: {
        options: ['Before 6AM', '6AM - 8AM', '8AM - 10AM', '10AM - 12AM', 'After 12AM']
    },
    goToBed: {
        options: ['Before 8PM', '8PM - 10PM', '10PM - 12AM', '12AM - 2AM', 'After 2AM']
    },
    foodPreference: {
        options: ['Almost Anything', 'Fish Only', 'Vegetarian', 'Vegan', 'Kosher']
    },
    smoker: {
        options: ['No', 'Yes', 'Outside Only']
    },
    workSchedule: {
        options: ['Professional (9-5)', 'Student', 'Work at Night', 'Work at Home', 'Mixed']
    },
    occupation: {
        options: ['Accounting', 'Administration/Secretarial', 'Advertising', 'Architecture/Design', 'Automotive/Mechanical', 'Aviation/Aeronautical', 'Beauty/Fashion', 'Biology/Life Science', 'Broadcasting/Publishing', 'Consulting', 'Customer Service/Support', 'Creative/Media', 'Education/Tranining', 'Engineering', 'Finance/Banking', 'Government/Social Service', 'Health Services', 'Hospitality', 'Human Resource/Recruiting', 'IT/Computers', 'Insurance', 'Internet/Media', 'Law Enforcement/Security', 'Legal', 'Manufacturing/Production', 'Marketing/Public Relations', 'Military', 'Non-Profit', 'Other', 'Physical Science/Environment', 'Real Estate', 'Retail', 'Sales', 'Sports/Fitness', 'Student/Graduate', 'Student/Undergraduate', 'Telecommunications', 'Trades/Labor', 'Transportation/Logistic']
    },
    preferSmoker: {
        options: ['No', 'Yes', 'Outside Only']
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
};

export const petsIcon = [
    {
        name: 'Cats',
        icon: 'fas fa-cat'
    },
    {
        name: 'Dogs',
        icon: 'fas fa-dog'
    },
    {
        name: 'Birds',
        icon: 'fas fa-dove'
    },
    {
        name: 'Fish',
        icon: 'fas fa-fish'
    },
    {
        name: 'Small Pets',
        icon: 'fas fa-feather'
    },
    {
        name: 'Reptiles',
        icon: 'fas fa-paw'
    }
];

export const amenitiesIcons = [
     
    {
        name: 'Gym',
        icon: a1
    },
    {
        name: 'Jacuzzi',
        icon: a2
    },
    {
        name: 'Dishwasher',
        icon: a3
    },
    {
        name: 'Parking',
        icon: a4
    },
    {
        name: 'Deck or Patio',
        icon: a5
    },
    {
        name: 'Private Closet',
        icon: a6
    },
    {
        name: 'Phone Jack',
        icon: a7
    },
    {
        name: 'Air Conditioning',
        icon: a8
    },
    {
        name: 'Wood Floors',
        icon: a9
    },
    {
        name: 'Carpet',
        icon: a10
    },
    {
        name: 'Elevator',
        icon: a11
    },
    {
        name: 'Laundry',
        icon: a12
    },
    {
        name: 'Pool',
        icon: a13
    },
    {
        name: 'Cable TV Jack',
        icon: a14
    },
    {
        name: 'Internet',
        icon: a15
    },
    {
        name: 'Private Entrance',
        icon: a16
    },
    {
        name: 'Wireless Internet',
        icon: a17
    },
    {
        name: 'Private Bathroom',
        icon: a18
    },
    {
        name: 'Tennis',
        icon: a19
    },
    {
        name: 'Fireplace',
        icon: a20
    },
    {
        name: 'Storage',
        icon: a21
    },
    {
        name: 'Yard',
        icon: a22
    },
    {
        name: 'High-rise',
        icon: a23
    },
    {
        name: 'Disability Access',
        icon: a24
    },
    {
        name: 'Walkup',
        icon: a25
    },
    {
        name: 'Laundromat',
        icon: a26
    },
    {
        name: 'Parking Lot',
        icon: a27
    },
    {
        name: 'Near Bus Stop',
        icon: a28
    },
    {
        name: 'Electronic Security',
        icon: a29
    },
    {
        name: 'Swimming Pool',
        icon: a30
    },
    {
        name: 'Security',
        icon: a31
    },
    {
        name: 'Near Subway',
        icon: a32
    },
    {
        name: 'Street Parking',
        icon: a33
    },
    {
        name: 'Garage',
        icon: a34
    },
    {
        name: 'Covered Parking',
        icon: a35
    },
    {
        name: 'Health Club',
        icon: a36
    },
    {
        name: 'Doorman',
        icon: a37
    },
    {
        name: 'Low-rise',
        icon: a38
    }
];