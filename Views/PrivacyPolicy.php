<!--

Project name:       Bloggy Blog
Project Version:    2.0
Module Name:        ReadPost.php
Module Version:     2.0
Module Description: A simple page to view blog posts.
Developers:         Jay Wilson, Julian Silvestre
Date:               11.11.2018

--><?php include '../Views/Layout/data.php';?><html>
<head>
    <!-- Link to the stylesheet -->
    <link rel="stylesheet" href="../CSS/style.css">
</head>

<header>
    <?php include 'Layout/Header.php'; ?>
</header>

<body>

<div id="formdiv">
    <div align="center" id="page-title">
        <br/>
        <br/>
        Privacy Policy
    </div>
    <form action="../Controllers/BlogController.php" method="POST">

        <div id="post-container" align="left" style="width: 80%;">
        <h3>Website Visitors</h3>
        <p>Like most website operators, BloggyBlog.com collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. BloggyBlog.com’s purpose in collecting non-personally identifying information is to better understand how BloggyBlog.com’s visitors use its website. From time to time, BloggyBlog.com may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.</p>

        <p>BloggyBlog.com also collects potentially personally-identifying information like Internet Protocol (IP) addresses. BloggyBlog.com does not use IP addresses to identify its visitors, however, and does not disclose such information, other than under the same circumstances that it uses and discloses personally-identifying information, as described below.</p>

        <h3>Gathering of Personally-Identifying Information</h3>
        <p>Certain visitors to BloggyBlog.com choose to interact with BloggyBlog.com in ways that require BloggyBlog.com to gather personally-identifying information. The amount and type of information that BloggyBlog.com gathers depends on the nature of the interaction. For example, we ask visitors who use our forums to provide a username and email address.</p>

        <p>In each case, BloggyBlog.com collects such information only insofar as is necessary or appropriate to fulfill the purpose of the visitor’s interaction with BloggyBlog.com. BloggyBlog.com does not disclose personally-identifying information other than as described below. And visitors can always refuse to supply personally-identifying information, with the caveat that it may prevent them from engaging in certain website-related activities, like purchasing a BlogConvention ticket.</p>

        <p>All of the information that is collected on BloggyBlog.com will be handled in accordance with GDPR legislation.</p>

        <h3>Protection of Certain Personally-Identifying Information</h3>
        <p>BloggyBlog.com discloses potentially personally-identifying and personally-identifying information only to those of project administrators, employees, contractors, and affiliated organizations that (i) need to know that information in order to process it on BloggyBlog.com’s behalf or to provide services available through BloggyBlog.com, and (ii) that have agreed not to disclose it to others. Some of those employees, contractors and affiliated organizations may be located outside of your home country; by using BloggyBlog.com, you consent to the transfer of such information to them.</p>

        <p>BloggyBlog.com will not rent or sell potentially personally-identifying and personally-identifying information to anyone. Other than to project administrators, employees, contractors, and affiliated organizations, as described above, BloggyBlog.com discloses potentially personally-identifying and personally-identifying information only when required to do so by law, if you give permission to have your information shared, or when BloggyBlog.com believes in good faith that disclosure is reasonably necessary to protect the property or rights of BloggyBlog.com, third parties, or the public at large.</p>

        <p>If you are a registered user of a BloggyBlog.com website and have supplied your email address, BloggyBlog.com may occasionally send you an email to tell you about new features, solicit your feedback, or just keep you up to date with what’s going on with BloggyBlog.com and our products. We primarily use our blog to communicate this type of information, so we expect to keep this type of email to a minimum.</p>

        <p>If you send us a request (for example via a support email or via one of our feedback mechanisms), we reserve the right to publish it in order to help us clarify or respond to your request or to help us support other users. BloggyBlog.com takes all measures reasonably necessary to protect against the unauthorized access, use, alteration, or destruction of potentially personally-identifying and personally-identifying information.</p>

        <h3>Use of personal information</h3>
        <p>We use the information you provide to register for an account, attend our events, receive newsletters, use certain other services, or participate in the BloggyBlog open source project in any other way.</p>

        <p>We will not sell or lease your personal information to third parties unless we have your permission or are required by law to do so.</p>

        <p>We would like to send you email marketing communication which may be of interest to you from time to time. If you have consented to marketing, you may opt out later.</p>

        <p>You have a right at any time to stop us from contacting you for marketing purposes. If you no longer wish to be contacted for marketing purposes, please click on the unsubscribe link at the bottom of the email.</p>

        <h3>Legal grounds for processing personal information</h3>
        <p>We rely on one or more of the following processing conditions:</p>

        <ul>
            <li>our legitimate interests in the effective delivery of information and services to you;</li>
            <li>explicit consent that you have given;</li>
            <li>legal obligations.</li>
            <li>Access to data</li>
            <li>You have the right to request a copy of the information we hold about you. If you would like a copy of some or all your personal information, please follow the instructions at the end of this policy.</li>
        </ul>

        <p>All BlogConvention attendee-provided data can be viewed and changed by the attendee via the Access Token URL that is emailed to confirm a successful ticket purchase.</p>

        <h3>Retention of personal information</h3>
        <p>We will retain your personal information on our systems only for as long as we need to, for the success of the BloggyBlog open source project and the programs that support BloggyBlog.com. We keep contact information (such as mailing list information) until a user unsubscribes or requests that we delete that information from our live systems. If you choose to unsubscribe from a mailing list, we may keep certain limited information about you so that we may honor your request.</p>

        <p>BloggyBlog.com will not delete personal data from logs or records necessary to the operation, development, or archives of the BloggyBlog open source project.</p>

        <p>BloggyBlog.com shall maintain BlogConvention attendee data for 3 years to better track and foster community growth, and then automatically delete non-essential data collected via registration. Attendee names and email addresses will be retained indefinitely, to preserve our ability to respond to code of conduct reports.</p>

        <p>On BlogConvention.org sites, banking/financial data collected as part of a reimbursement request is deleted from BlogConvention.org 7 days after the request is marked paid. The reason for the 7-day retention period is to prevent organizers having to re-enter their banking details if a wire fails or if a payment was marked “Paid” in error. Invoices and receipts related to BlogConvention expenses are retained for 7 years after the close of the calendar year’s audit, by instruction of our financial consultants (auditors & bookkeepers).</p>

        <p>When deletion is requested or otherwise required, we will anonymise the data of data subjects and/or remove their information from publicly accessible sites if the deletion of data would break essential systems or damage the logs or records necessary to the operation, development, or archival records of the BloggyBlog open source project.</p>

        <h3>Rights in relation to your information</h3>
        <p>You may have certain rights under data protection law in relation to the personal information we hold about you. In particular, you may have a right to:</p>

        <ul>
            <li>request a copy of personal information we hold about you;</li>
            <li>ask that we update the personal information we hold about you, or independently correct such personal information that you think is incorrect or incomplete;</li>
            <li>ask that we delete personal information that we hold about you from live systems, or restrict the way in which we use such personal information (for information on deletion from archives, see the “Retention of personal information” section);</li>
            <li>object to our processing of your personal information; and/or</li>
            <li>withdraw your consent to our processing of your personal information (to the extent such processing is based on consent and consent is the only permissible basis for processing).</li>
            <li>If you would like to exercise these rights or understand if these rights apply to you, please follow the instructions at the end of this Privacy statement.</li>
        </ul>

        <h3>Third Party Links</h3>
        <P>Our website may contain links to other websites provided by third parties not under our control. When following a link and providing information to a 3rd-party website, please be aware that we are not responsible for the data provided to that third party. This privacy policy only applies to the websites listed at the beginning of this document, so when you visit other websites, even when you click on a link posted on BloggyBlog.com, you should read their own privacy policies.</p>

        <h3>Aggregated Statistics</h3>
        <p>BloggyBlog.com may collect statistics about the behavior of visitors to its websites. For instance, BloggyBlog.com may reveal how many times a particular version of BloggyBlog was downloaded or report on which plugins are the most popular, based on data gathered by api.BloggyBlog.com, a web service used by BloggyBlog installations to check for new versions of BloggyBlog and plugins. However, BloggyBlog.com does not disclose personally-identifying information other than as described in this policy.</p>

        <h3>Cookies</h3>
        <p>Additionally, information about how you use our website is collected automatically using “cookies”. Cookies are text files placed on your computer to collect standard internet log information and visitor behaviour information. This information is used to track visitor use of the website and to compile statistical reports on website activity.</p>

        <p>Please see our cookie policy for more information about what cookies are collected on BloggyBlog.com.</p>

        <h3>Privacy Policy Changes</h3>
        <p>Although most changes are likely to be minor, BloggyBlog.com may change its Privacy Policy from time to time, and at BloggyBlog.com’s sole discretion. BloggyBlog.com encourages visitors to frequently check this page for any changes to its Privacy Policy. Your continued use of this site after any change in this Privacy Policy will constitute your acceptance of such change.</p>

        <h3>Contact</h3>
        <p>Please contact us if you have any questions about our privacy policy or information we hold about you by emailing dpo@BlogConvention.org.</p>
        </div>
    </form>
</body>

<footer>
    <?php include 'Layout/Footer.php'; ?>
</footer>

</html>
<?php