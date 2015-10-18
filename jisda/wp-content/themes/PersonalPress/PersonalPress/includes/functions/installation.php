 <span class="boldtext">1. How do I install PersonalPress onto my wordpress blog? </span>
<div class="indent">
  <p>There are several files included in the ZIP folder. These include wordpress theme files, plugin files, and photoshop files. To installed your wordpress theme you will first need to upload the theme/plugin files via FTP to your server. </p>
  <p>First you are going to upload the theme folder. Inside the ZIP folder you downloaded you will see a folder named &quot;theme.&quot; Within it is a folder named &quot;PersonalPress.&quot; Via ftp, upload the &quot;PersonalPress&quot; folder to your Wordpress themes directory. Depending on where you installed Wordpress on your server, the wp themes folder will be located in a path similar to: /public_html/blog/wp-content/themes. </p>
  <p>Next you need to select PersonalPress and make it your default theme. Click on the design link, and under the themes tab locate PersonalPress from the selection of themes and activate it. Your blog should now be updated with your new theme. </p>
<p>Finally, once the theme has been activated, you should navigate to the Appearances > PersonalPress Theme Options page. Here you can adjust settings pertaining to theme's display. Once you have adjusted whatever settings you would like to change click the "save" button. You must click the "save" button for the options to be saved to the database. Even if you did not change anything you should click the save button once before using the theme to insure that the database has been written correctly.</p>
</div>
<span class="boldtext">2. How do I add the thumbnails to my posts? </span>
<div class="indent">
  <p>PersonalPress utilizes a script called TimThumb to automatically resize images. Whenever you make a new post you will need to add a custom field. Scroll down below the text editor and click on the &quot;custom fields&quot; link. In the &quot;Name&quot; section, input &quot;Thumbnail&quot; (this is case sensitive). In the &quot;Value&quot; area, input the url to your thumbnail image. Your image will automatically be resized and cropped. The image must be hosted on your domain. (this is to protect against bandwidth left) </p>
  <p><span class="style1">Important Note: You <u>must</u> CHMOD the &quot;cache&quot; folder located in the PersonalPress directory to 777 for this script to work. You can CHMOD (change the permissions) of a file using your favorite FTP program. If you are confused try following <a href="http://www.siteground.com/tutorials/ftp/ftp_chmod.htm"><u>this tutorial</u></a><u>.</u> Of course instead of CHMODing the template folder (as in the tutorial) you would CHMOD the &quot;cache&quot; folder found within your theme's directory. </span></p>
</div>
<span class="boldtext">3. How do I add my title/logo? </span>
<div class="indent"><p>In this theme the title/logo is an image, which means you will need an image editor to add your own text. You can do this by opening the blank logo image located at Photoshop Files/logo_blank.png, or by opening the logo PSD file located at Photoshop Files/logo.psd. Replace the edited logo with the old logo by placing it in the following directory: theme/PersonalPress/images, and naming the file "logo.png". If you need more room, or would like to edit the logo further, you can always do so by opening the original fully layered PSD file located at Photoshop Files/PersonalPress.psd</p></div>

<span class="boldtext">4. How do I manage advertisements on my blog? </span>
<div class="indent"><p>You can change the images used in each of the advertisements, as well as which URL each ad points to, through the custom option pages found in wp-admin. Once logged in to the wordpress admin panel, click &quot;Design&quot; and then &quot;PersonalPress Theme Options&quot; to reveal the various theme options. You can also use the 125x125 advertisement widget by adding the ET: Advertisement widget to your sidebar, and filling in the required fields.</p></div>

  <span class="boldtext">5. How do I add descriptions to my pages navigation links? </span>
  <div class="indent">
  <p>This theme was made to be used with the new Nav Menu system introduced in WordPress 3.0. If you are running WordPress 3.0, then you can customize your navigation bar using the Appearances > Menus tab in wp-admin. To add a description to a menu link that you have created, simply add the description to the link's "Navigation Label." The navigation label must be formatted a certain way in order to work. You should added the title of the link, followed by three forward slashes ///, followed by your link's description. For example, I might format a link like this:
  <br /> 
  <br />  
  About /// Learn more about who I am
 <br /> 
  <br /> 
  This navigation label would create a link called "About" with a description of "Learn more about who I am." There should be a space before and after the three slashes. 
   <br /> 
  <br /> 
If you are not using WordPress 3.0, then you can add descriptions using custom fields instead. To do this simply add a new custom field to each of your pages with a Name of "Tagline" and a Value of the description text you would like to use. You can also customize the description of your Home link via the navigation tab of the Appearances > PersonalPress Theme Options page in wp-admin. </p></div>

  <span class="boldtext">6. How do I add my social media links? </span>
  <div class="indent">
  <p>
  The theme comes with an ET: Social widget that can be used to add the social media icons seen in the demo. Simply add the url of the icon, and the destination URL, for each item. If you need some great icons then you might consider using the Elegant Social Icons pack : <a href="http://www.elegantthemes.com/blog/resources/free-social-media-icon-set">http://www.elegantthemes.com/blog/resources/free-social-media-icon-set</a>
  </p></div>