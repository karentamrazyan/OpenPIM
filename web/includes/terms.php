<?php

if (count(Site::$args) != 1) Site::notFound();

Site::head();

Site::$content .= '
<h1>Terms of Use</h1>
<p>Your access to the Site is conditional upon your acceptance and compliance with the terms, conditions, notices and disclaimers contained in this document and any changes to this Terms of Use Agreement (further referred to as "Agreement") that OpenPIM may publish from time to time. By accessing or using this Site in any way, including, without limitation, subscribing to a newsletter, purchasing any services through the Site, searching the Site or merely browsing the Site, you agree to and are bound by the terms, conditions, restrictions and limitations of this Agreement and Privacy Policy. Every time you access the Site, by doing that you confirm your agreement with OpenPIM’ Privacy Policy and this Agreement. You must familiarize yourself with this information and are encouraged to update your knowledge often.</p>
<h2>Eligibility</h2>
<p>By using the Site, you warrant that you have the right, authority, and capacity to enter into this Agreement. Your use of the Site is conditional upon your acceptance and compliance with this Agreement and OpenPIM’ Privacy Policy.</p>
<h2>Content</h2>
<p>All information, text, material, graphics, files and software used on the Site (further referred to as "Content") are protected international copyright and trademark laws. Except as otherwise explicitly agreed to in writing, the Content received through the Site may be downloaded, displayed, reformatted and printed for your personal, non-commercial use only, through the means of your home computer. You agree not to reproduce, retransmit, distribute, sell, republish, frame, broadcast or circulate the Content received through the Site, without OpenPIM’ prior written consent.</p>
<h2>Links to other websites</h2>
<p>The Site contains links to third party websites and advertisements with such links. These linked websites are not under control of OpenPIM and OpenPIM is not responsible for the contents of any linked web site. The inclusion of the link or advertisement on the Site does not imply any endorsement of the linked website, and OpenPIM has no knowledge of those web sites and/or their products. You should refer to the relevant advertiser for the product information and customer support.</p>
<h2>Disclaimer and limitation of liability</h2>
<p>The Service and Content are provided "as is", without warranties of any kind, either express or implied.</p>
<p>OpenPIM does not warrant that your use of the Site will be uninterrupted or error-free, that any defects will be corrected or that the Site and its server are free from viruses or any other harmful components.</p>
<p>OpenPIM does not warrant any Content in terms of correctness, accuracy, timeliness, or completeness;</p>
<p>OpenPIM expressly disclaims warranties of any kind including without limitation implied warranties of merchantability and fitness for a particular purpose. Under no circumstances, including without limitation any act or negligence on the part of OpenPIM, will OpenPIM or its affiliates be liable for any indirect, incidental, special and/or consequential damages or loss of profits whatsoever which result from any use, or any inability to use the Site or any Content. The Content is published for information only without assuming a duty of care. OpenPIM is not in the business of providing professional advice, and gives no warranty, guarantee or other representation about the accuracy of any Content. OpenPIM is not liable for errors, omissions, delays, interruptions or cessation of the services through negligence or otherwise. To the extent permitted by law, OpenPIM disclaims liability to all persons in relation to any loss or damage suffered through their use of the Site or communication with other Members. To the extent permitted by law, in the case of services supplied or offered by OpenPIM, its liability for breach of any implied warranty or condition that cannot be excluded by the law is limited, at the sole discretion of OpenPIM, to the supply of the services again, or the payment of the cost of having the services supplied again.</p>
<h2>Changes to this Agreement</h2>
<p>OpenPIM may choose to change the terms, conditions and operation of this Agreement anytime, such modifications to be effective upon posting on the Site.</p>
<h2>Other rights</h2>
<p>All rights not expressly granted herein are reserved.</p>
';

Site::foot();

?>
