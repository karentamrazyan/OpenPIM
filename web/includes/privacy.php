<?php

if (count(Site::$args) != 1) Site::notFound();

Site::head();

Site::$content .= '
<h1>Privacy Policy</h1>
<p>We recognize that your privacy is very important and that you have a right to control your personal information. We understand that providing personal information is an act of trust and we strive to protect your personal information and safeguard your privacy and security.</p>
<h2>Information collection and use</h2>
<p>OpenPIM is the sole owner of the information collected on this site. We will NEVER sell, rent, or share this information with any other party, unless it is required to provide the service your are requesting. When purchasing any products or services from OpenPIM, we will use the email address you have submitted to contact you regarding the status of your order and also from time to time to send you information on updates to our products and services as well as promotional information on products and services of our partners that may be of some interest to you. You may choose to stop receiving those updates at any time.</p>
<h2>Links to other sites</h2>
<p>This website contain links to other websites. Please note that we do not cover privacy practices of those web sites. If you decide to purchase any services from those websites or sign up for any offers or newsletters while being on the sites, you must carefully review the privacy policy of these web sites before making your decision.</p>
<h2>Email enquiries</h2>
<p>When you send an email enquiry to OpenPIM, we will only use the return email address to answer your query. We will not use this email address for any other purpose and will not share it with any third party for the purposes other than answering your email query. OpenPIM may retain the emails we receive for the purpose of using them as a testimonial, as a proof. When submitting a testimonial, you should be aware any personally identifiable information you submit such as your name, web site address, city, state and/or country may be displayed on our site, where third parties can see this information and use it to contact you. Please be aware that by submitting a testimonial including personally identifiable information, you are doing it at your own risk and OpenPIM is not responsible for any future communication that you may receive as the result of this submission.</p>
<h2>Cookies</h2>
<p>A "cookie" is a small data file that can be placed on your computer\'s hard drive by some web sites you are visiting. Our partners and advertisers may use cookies. We do not control the cookies used by other web sites you may be visiting through the links on this web site, and we expressly disclaim any liability for the information collected through the cookies set by any other site than OpenPIM.</p>
<h2>Log Files</h2>
<p>Our web site does NOT keep any kind of log files.</p>
<h2>Data Security</h2>
<p>We strive to protect your personal information and prevent misuse or alteration of the information that we collect from our users. While we do our best to ensure security of our website and network, we cannot guarantee that the security measures we undertake will prevent third parties from illegally obtaining this information.</p>
<h2>Contacting OpenPIM</h2>
<p>If you have any questions about the information we collect from our users, you may contact us through the contact page of this website.</p>
<h2>Revisions to This Privacy Policy</h2>
<p>We reserve the right to make changes to this policy and/or our Terms of Service agreement at any time, such updates to be effective by posting on the site.</p>
';

Site::foot();

?>
