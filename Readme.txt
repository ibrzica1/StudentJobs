GENERAL

Student Jobs is a site for students seeking work.
There is 2 types of jobs, helper jobs and intership jobs.
Helper jobs are short term jobs when someone needs help with something.
Usually its s few hours of work, like help with moving or babysitting gig.
Intership jobs are more permanent position, with weekly hours and a contract.
When registering user can decide how does he/she wants to register as a student,
or as a employer.
Student is entering Account Information(Email, Password), Personal Details (Name, Surname),
Contact Details (City, Street, House Number, Telephone) and Profile Picture (optional).
Employer is entering Account Information(Email, Password),  Personal Details (Name, Surname),
Company Data (Company Name, City, Street, House Number, Telephone Number and Company Logo).


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


