# ci_calendar

###### About ######
Create events using CodeIgniter's Calendar class

###### Installation ######
Download the unzip repository
OR 
Run : git clone https://github.com/anupamoza/ci_calendar.git (provided you have git installed)

Pre-requisites :
1. You Need to have Codeigniter installed and configured with HMVC configured 
(for HMVC installation check this : http://www.techitgeeks.com/2017/04/15/install-modular-extensions-hmvc/)

2. Once above is done copy '/application/modules/calendar' in your 'modules' folder.

3. Run below SQL Query : 

********************************************************
        create table meeting_calendar (
        id int identity(1,1) not null primary key,
        date date not null,
        data varchar(255)
        ); 

        for MySql run below :

        create table meeting_calendar (
        id int not null primary key AUTO_INCREMENT,
        date date not null,
        data varchar(255)
        ); 
********************************************************

4. Run : http://yourhostname/index.php/calendar/display/ OR http://yourhostname/calendar/display/
(To check how to remove index.php from htaccess 
check : http://www.techitgeeks.com/2017/04/15/steps-to-remove-index-php-from-url-in-codeigniter/ )