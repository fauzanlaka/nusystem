<span class="boldtext">1. How do I installed Bluemist onto my wordpress blog? </span>
<div class="indent">
  <p>There are several files included in the ZIP folder. These include wordpress theme files, plugin files, and photoshop files. To installed your wordpress theme you will first need to upload the theme/plugin files via FTP to your server. </p>
  <p>First you are going to upload the theme folder. Inside the ZIP folder you downloaded you will see a folder named "theme." Within it is a folder named "Bluemist." Via ftp, upload the "Bluemist" folder to your Wordpress themes directory. Depending on where you installed Wordpress on your server, the wp themes folder will be located in a location similar to: /public_html/blog/wp-content/themes. </p>
  <p>Next you need to upload the plugin files. Inside the zip folder you downloaded there will be a folder named "plugin." Within this folder are several other folder which need to be uploaded to your Wordpress plugins directory. This directory will be located at /public_html/blog/wp-content/plugins. Once you have the plugins uploaded you will need to activate them via your Wordpress control panel. Login to your wordpress admin area and click on the "plugins" link. Activate the following plugins:  Social Dropdown. </p>
  <p>Next you need to select Bluemist and make it your default theme. Click on the design link, and under the themes tab locate Bluemist from the selection of themes and activate it. Your blog should now be update with your new theme. </p>
</div>
<span class="boldtext">2. How do I add the thumbnails to my homepage? </span>
<div class="indent">
  <p>Adding thumbnails is easy. Whenever you make a new post you will need to add a custom field. Scroll down below the text editor and click on the "custom fields" link. In the "Key" section, input "Thumbnail" (this is case sensitive). In the "Value" area, input the url to your thumbnail image. Make sure you image is the right size, 94x94 pixels, or it will appear distorted. </p>
  <p>To add larger thumbnails to your featured posts, simply create a second custom field with the key "Featured." In the value area, input the url to your thumbnail image. Make sure the image is the correct size, 384px ? 122px.</p>
</div>
<span class="boldtext">3. How do I add my title/logo? </span>
<div class="indent"><p>In this theme, the title/logo is an image, which means you will need an image editor to add your own text. You can do this by opening the blank logo image located at Photoshop Files/logo.jpg, or by opening the logo PSD file located at Photoshop Files/logo.psd. Replace the edited logo with the old logo by placing it in the following directory: theme/Bluesky/images. If you need more room, or would like to edit the logo further, you can always do so by opening the original fully layered PSD file located at Photoshop Files/bluesky.psd></p> </div>
<span class="boldtext">4. How do I display my own adsense ads? </span>
<div class="indent">
  <p>Adsenes ads are already running by default, but you still need to add your own publisher ID. To do this locate the folder "adsense" within the Bluemist theme directory. Within it there are two files for the two different add sizes and locations. Replace the existing code with your own unique adsense code. </p>
  </div>
  <span class="boldtext">5. How do I customize the "About Us" section? </span>
  <div class="indent">
  <p>This section is included into the design from a separate php file, just like the adsense codes. To edit it, simply open about.php and replace the content with your own. Be careful not to write too much, or the content with overflow. </p>
  </div>
    <span class="boldtext">6. How do I setup the Featured Articles on the homepage? </span>
    <div class="indent">
  <p>If you use this theme you will need to have a featured article on your hompage. These featured articles are pulled from a category within your blog. First, you need to make a category called "Featured Articles." You must spell it correctly in order for it to work. Once you have created to category, simply add posts to it when you want them to show up as your featured article. Only one featured article is displayed at a time. </p>
  <p>On a side note, you can add your article to other categoriest as well and still have it show up as a featured article by simply adding the article to the Featured Articles section in addition to its normal category. </p>
    </div>
