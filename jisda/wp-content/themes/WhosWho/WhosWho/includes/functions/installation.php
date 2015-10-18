<span class="boldtext">1. How do I install WhosWho onto my wordpress blog? </span>
<div class="indent">
  <p>There are several files included in the ZIP folder. These include wordpress theme files, plugin files, and photoshop files. To installed your wordpress theme you will first need to upload the theme/plugin files via FTP to your server. </p>
  <p>First you are going to upload the theme folder. Inside the ZIP folder you downloaded you will see a folder named "theme." Within it is a folder named "WhosWho." Via ftp, upload the "WhosWho" folder to your Wordpress themes directory. Depending on where you installed Wordpress on your server, the wp themes folder will be located in a path similar to: /public_html/blog/wp-content/themes. </p>
  <p>Next you need to select WhosWho and make it your default theme. Click on the design link, and under the themes tab locate WhosWho from the selection of themes and activate it. Your blog should now be updated with your new theme. </p>
</div>
<span class="boldtext">2. How do I add the thumbnails to my posts? </span>
<div class="indent">
  <p>WhosWho utilizes a script called TimThumb to automatically resize images. Whenever you make a new post you will need to add a custom field. Scroll down below the text editor and click on the "custom fields" link. In the "Key" section, input "Thumbnail" (this is case sensitive). In the "Value" area, input the url to your thumbnail image. Your image will automatically be resized and cropped. The image must be hosted on your domain. (this is to protect against bandiwdth left) </p>
  <p><span class="style1">Important Note: You <u>must</u> CHMOD the "cache" folder located in the WhosWho directory to 777 for this script to work. You can CHMOD (change the permissions) of a file using your favorite FTP program. If you are confused try folowing <a href="http://www.siteground.com/tutorials/ftp/ftp_chmod.htm"><u>this tutorial</u></a><u>.</u> Of course instead of CHMODing the template folder (as in the tutorial) you would CHMOD the "cache" folder found within your theme's directory. </span></p>
</div>
<span class="boldtext">3. How do I add my title/logo? </span>
<div class="indent"><p>In this theme, the title/logo is an image, which means you will need an image editor to add your own text. You can do this by opening the blank logo image located at Photoshop Files/logo.jpg, or by opening the logo PSD file located at Photoshop Files/logo.psd. Replace the edited logo with the old logo by placing it in the following directory: theme/WhosWho/images. If you need more room, or would like to edit the logo further, you can always do so by opening the original fully layered PSD file located at Photoshop Files/bluesky.psd</p> </div>

<p><span class="boldtext">4. How do I customize the four category blocks on the homepage? </span></p>
<div class="indent"><p>On the home page of your blog there are 4 boxes that show recent articles from 4 particular categories. You can choose which category each box pulls from, as well as customize the orange title above the article to match the categories real name. This can all be done by using the custom option pages found in wp-admin. You will need the ID's of each of the categories you would like to pull from. If you don't know what the category ID is, just look at the end of the URL when browsing the category in your web browser.</p> </div>

<span class="boldtext">5. How do I edit the 125x125 advertisements in the sidebar? </span>
<div class="indent"><p>You can change the images used in each of the advertisements, as well as which URL each ad points to, through the custom option pages found in wp-admin.</p> </div>

<span class="boldtext">6. Can I change how many recent posts are displayed on the homepage? </span>
<div class="indent"><p>You sure can. The number of recent posts being displayed on the homepage can be changed at any time via the custom option pages in wp-admin.</p> </div>

<span class="boldtext">7. How do I change the feedburner count to reflect my own blog? </span>
<div class="indent"><p>To change the feedburner count you need to go into the theme options page and edit the Feedburner Blog Title section. The feedburner blog title is the unique name you gave your blog that is shown at the end of your feedburner url. If you don't know what yours is you can find out by logging in to feedburner and creating your own feedburner count image. Look at the URL given in the link code.</p>  </div>

<span class="boldtext">8. How do I change the RSS Email Subscribe form so that people subscribe to my blog? </span>
<div class="indent"><p>You need to edit this in the theme options page. Enter your feedburner feed ID in the "Feedburner Feed ID" section.</p> </div>

<span class="boldtext">9. How do I setup the Featured Articles on the homepage? </span>
<div class="indent">
<p>If you use this theme you will need to have a featured article on your homepage. These featured articles are pulled from a category within your blog. First, you need to make a category called "Featured Articles." You must spell it correctly in order for it to work. (case sensitive!) Once you have created to category, simply add posts to it when you want them to show up as your featured article. Only one featured article is displayed at a time. </p>
<p>On a side note, you can add your article to other categories as well and still have it show up as a featured article by simply adding the article to the Featured Articles section in addition to its normal category. </p>
    </div>

