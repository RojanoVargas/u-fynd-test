# u fynd test
 "Failure is an option here. If things are not failing, you are not innovating enough." - Elon Musk

This file is part of the task 1 of the u:fynd recruiting process.


Task 2
1. history.php and launches.php are located in the "task 2 & task 3" folder.
2. As requested, history is a simple template page: <?php /* Template Name: history */ ?>
Launches has more content (as requested for task 3)
3. To be displayed in any WordPress site, the CMS’s user needs to:
    3.1. Add the files history.php and launches.php in the route: wp-content/themes/active-theme (where active-theme is the name of the theme)
    3.2. In WordPress go to Pages -> Add New -> Page Attributes (right bar) -> Template: history/launches -> Publish


Task 3
functions.php:
1. The CMS's user needs to copy all content from our the functions.php to the bottom of the functions.php of their WordPress (the file is on the same route as the ones from 3.1 on task 2) - this code creates a custom post type and scrapes the API
2. Also has to paste the "single-launch-php"
3. The user needs to install the plugin Advanced Custom Fields:

    ![plugin ACF](https://ireneyeloy.com/wp-content/uploads/2021/05/1.-ACF-Plugin-install-and-activate.jpg)
    
    And create the following custom fields and copy the location rules: 

    ![fields for ACF](https://ireneyeloy.com/wp-content/uploads/2021/05/necessary-custom-fields.jpg)

    Afterwards, to go to functions.php and paste the keys that ACF generates and substitute them on the functions.php:

    ![substitute fields functions.php](https://ireneyeloy.com/wp-content/uploads/2021/05/change-for-the-new-ones.jpg)

4. Afterwards, the user will need to browse the url: websiteurl/wp-admin/admin-ajax.php?action=get_launches_from_api to start scraping
5. Finally, all launches will be available at the WP database (in the custom post type). If the user creates a new page (Pages -> Add New -> Page Attributes (right bar) -> Template: launches -> Publish) will be able to see and navigate all launches.


Fun fact: when I tried to retrieve data from the API of V4 (instead of V3), this video url was printed on the screen: https://www.youtube.com/watch?v=RfiQYRn7fBg and it didn't let me access any of the API content.


Task 4
1. I created a wireframe to have a clear overview of the skeletal outline of the landing that can be visited here: https://wireframe.cc/IBNojS
2. The branding was inspired (and adapted) from one of the pages in the original website: https://www.spacex.com/vehicles/falcon-9/ 
3. In the folder "Task 4" you will find the index.html, linked with a stylesheet (style.css) and "images". Drag the index.html into your browser to navigate the page. I would recommend using Google Chrome for the best experience.


I have been testing my solutions on a local WordPress. Anything can be shown on the interview. I'll keep the credentials here in case of needing it when showing it to you: user: eloy / pass: ufynd_test_pass. The folder for this local installation is also accessible at ufyndtest.github.io

Thank you for your time!