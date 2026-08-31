GENERAL

Student Jobs is a site for students seeking work.
There are 2 types of jobs, helper jobs and intership jobs.
Helper jobs are short term jobs when someone needs help with something.
Usually its s few hours of work, like help with moving or babysitting.
Intership jobs are more permanent position, with weekly hours and a contract.
When registering user can decide how does he/she wants to register as a student,
or as a employer.
Student is entering Account Information(Email, Password), Personal Details (Name, Surname),
Contact Details (City, Street, House Number, Telephone) and Profile Picture (optional).
Employer is entering Account Information(Email, Password),  Personal Details (Name, Surname),
Company Data (Company Name, City, Street, House Number, Telephone Number and Company Logo).
Student can apply on the jobs.
Employer is choosing amoung the applications and when he/she accepts the application, employer and
student will be provided with eachoders email for contact.
When posting a job employer will be provided with the bill.
Bill is payed by bank transaction and admin is deciding if the bill is payed


LOCATION

In the table locations I have entered all the places in Germany.
So when the user is entering his city while registering, there will be city suggestions.

CACHING

For the latest jobs on index page I use pagination, 
so I cache every page that has been clicked under cache key
latest_jobs_ $pageNumber for 120 seconds.

LOCALIZATION

Localization is made for three lenguages English, German and Croatian.
Change location element is located in app navigation element. 
To change locale call 'locale.set' route and pass the desired locale, 
in changeLocale function will validate if passed locale is valid and if yes locale will be changed

TESTING

Testing for Auth and Profile are from Breeze package but refactored
Testing for Job is done by testing CRUD and for routes 
testing authorization and authentication happy path and not happy path.
Testing the homepage is done by testing the loading of the page, 
pagination of the jobs and filtering the jobs by category.
