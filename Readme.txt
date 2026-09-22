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
Employer can create job postings. He can clickon create helper job or create intership job.
After clicking he is redirected on the category page where he can choose which category the 
job is babysitting, moving, IT, construction, ect...
If category is selected form for creating a job will be partially autofilled with some data.
Homepage is displaying active job posts, posts are paginated 12 per page.
You can search job posts by category 
By clicking on the job post, it will show that post with all the job information
Student can view and apply on a job. When he applies new Application is created and NewApplication Event
is trigered which sends email to employer informing him about the new applicant.
Employer can view all his job postings in my-ads blade. There 


LOCATION

In the table locations I have entered all the places in Germany.
So when the user is entering his city while registering, there will be city suggestions.

CACHING

For the latest jobs on index page I use pagination, 
so I cache every page that has been clicked under cache key
latest_jobs_ $pageNumber for 120 seconds.
For my ads I used cache with key my_ads for 120 seconds.

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
Testing for company is done by testing CRUD and for routes.
Testing Localization is done by testing if locale can be changed.
Testing for email is done if by checking if mails can be send.
