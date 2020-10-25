CREATE TABLE enterprise_aboutus (
    id          TINYINT(4)  NOT NULL AUTO_INCREMENT,
    name        VARCHAR(80) NOT NULL DEFAULT '',
    description TEXT        NOT NULL,
    image       VARCHAR(80)          DEFAULT NULL,
    PRIMARY KEY (id)
)
    ENGINE = ISAM;
INSERT INTO enterprise_aboutus
VALUES (1, 'Corporate Profile',
        '<br /><p>China-Offshore is an IT development service provider with headquarters in Paris, Shanghai and Beijing.</p><p>China-Offshore leverages our world class project management expertise to offer a unique combination of quality software development and business process outsourcing services through China\'s highly skilled and competitive resources.</p><p>Our development process is also available as specific services, including staff augmentation, software testing, and software localization.</p><p>China-Offshore\'s expertise domains widely cover banking, telecom, insurance and securities.</p>\r\n<p>Other details could take place here such as: info about corporate leaders, backgrounds, ...',
        '');
INSERT INTO enterprise_aboutus
VALUES (6, 'Price Information', 'Our rates are very low compared with European and American standard and our clients get higher quality of services, for some projects, total cost saving could be as much as 80%.\r\n\r\n ', '');
INSERT INTO enterprise_aboutus
VALUES (2, 'How we do it ?',
        '<p>We have software development centers with state-of-the-art facilities in Shanghai (China), and Beijing The features of all our facilities are:<ul><li>Completely networked work environment</li><li>High-speed data communication links providing connectivity to clients worldwide </li><li>Round-the-clock physical security </li><li>Computing Infrastructure</li><li>Powerful workstations with the latest utilities, compilers and tools for development, testing and configuration management</li><li>Full Data Backup, Daily/Weekly/Monthly. Data is maintained for 12 months and we can recover data up to the last 4 hours. For daily backup, one copy is maintained on a Hard Drive while the second on a DAT Tapes. For weekly backup, two copies are made; one is maintained in-house in fireproof safe while the second is maintained in our remote location 120 kilometers from our development center</li><li>Preventive Maintenance of Operating systems and Software </li><li>Real Time Virus Protection for entire network</li><li>24/7/365 Power Availability</li><li>99% uptime for Internet Connectivity</li><li>Comprehensive Intranet for Project Management, Customer Relationship Management and Internal Office communication and knowledge sharing</li></ul>',
        '');
INSERT INTO enterprise_aboutus
VALUES (7, 'Others (Technologies)',
        '<p>You can add as much entries as you want.</p><p>"about us" entries are showed in every Entreprise-X page, fill in with information that you consider the most important for your presentation.<p><ul><li>Programming Languages : Java, C/C++, Power Builder, Delphi, ASP, VB, PHP...</li><br /><li>Web Severs/OS : IIS, Apache, Windows, Linux, Unix... </li> <li>Data Bases : Oracle, SQL Server, Sybase, MySQL, Access...</li> </ul></p>',
        '');
# --------------------------------------------------------
CREATE TABLE enterprise_front (
    front_title           VARCHAR(120) NOT NULL DEFAULT '',
    front_intro           TEXT         NOT NULL,
    front_image           VARCHAR(80)           DEFAULT NULL,
    testimony_title       VARCHAR(120)          DEFAULT NULL,
    testimony_intro_front TEXT,
    testimony_intro       TEXT,
    testimony_image       VARCHAR(80)           DEFAULT NULL,
    services_title        VARCHAR(120) NOT NULL DEFAULT '',
    services_intro_front  TEXT         NOT NULL,
    services_intro        TEXT         NOT NULL,
    services_image        VARCHAR(80)           DEFAULT NULL
)
    ENGINE = ISAM;
INSERT INTO enterprise_front
VALUES ('China-Offshore Outsourcing Development',
        '\r\nChina-Offshore is an IT development service provider with headquarters in Paris, Shanghai and Beijing.\r\n\r\n<a href="http://www.china-offshore.com">China-Offshore</a> leverages our world class project management expertise to offer a unique combination of quality software development and business process outsourcing services through China\'s highly skilled and competitive resources.\r\n\r\nOur development process is also available as specific services, including staff augmentation, software testing, and software localization.\r\n\r\nChina-Offshore\'s expertise domains widely cover banking, telecom, insurance and securities.',
        '', 'What Our Customers Say',
        '"Actually we have been very pleased with the cooperation. I think both sides have had to learn about how to work together, both between cultures and between technologies, but we seem to have created a good result...I will be hoping to work again with <a href="http://www.china-offshore.com">China-Offshore</a> in the future" \r\n\r\n---Alain Durand, Head of Systems',
        'With more then 5 years of software outsourcing project and product development experience in IT areas, <a href="http://www.china-offshore.com">China-Offshore</a> has built up excellent expertises in several technology areas. Dedicated people, world-class development processes, a sophisticated knowledge management system and QA system have allowed us to significantly retain this expertise in-house.',
        '', 'Services and Capabilities', '<p>Our offer consists of two major family of services:</p><ul><li>Offshore development for software projects</li><li>Virtual staff augmentation (On demand software developers)</li></ul>',
        '<p>China-Offshore has implemented UML and Rational Rose as standard method and tool in all project design and development process.</p>', '');
# --------------------------------------------------------
CREATE TABLE enterprise_service (
    id         TINYINT(4)   NOT NULL AUTO_INCREMENT,
    title      VARCHAR(120) NOT NULL DEFAULT '',
    text_short TEXT         NOT NULL,
    text_long  TEXT         NOT NULL,
    image      VARCHAR(80)           DEFAULT NULL,
    PRIMARY KEY (id)
)
    ENGINE = ISAM;
INSERT INTO enterprise_service
VALUES (1, 'Virtual Staff Augmentation (Offshore R&D Units)',
        'China-Offshore offers on demand R&D capacities to European and American companies. Advantages of this offer are that clients can compose their stable development teams at will, team members are selected based on their professional profile and are employed by China-Offshore, working in China. Cost savings can be as much as 80% compared with Europe and America based staff.\r\n\r\nClient companies can either send their project leaders to work with remote team members in China or manage the project distantly.\r\n',
        'Here are you can add :<br />More detailed description of this service item ... ', '');
INSERT INTO enterprise_service
VALUES (3, 'Offshore development for software projets',
        '<p>We can provide services at any stage of the development cycle, should it be architecture design, implementation, test or integration. We also support other service companies in development staff/capacity.</p><p>Both english and francais are our working language, in China-Offshore Shanghai Center there are regularly short term western engineers participating project developments.</p><p>China-Offshore is collaborating with the world\'s online video conferencing leader FVC to provide the most advanced communication tools for our clients. Projects can be managed in real time at your offices.</p>',
        'Here are can add more detailed description of this service item ... \r\n\r\nexample\r\n\r\nAs a leading service provider of offshore outsourcing in China, China-Offshore is focused on offering you top class custom software development service at reasonable prices.<br /><br />In the past three years, China-Offshore has completed over 50 software development projects which bring us abundant development experiences. We have the expertise and strengths in the following fields:<br /><br />Software Analysis and Design <br />Software Upgrade <br />Software Testing <br />Web Development <br />Systems Programming <br />E-Commerce Applications <br />Database Tuning and Automated Maintenance <br />Why we can do it?<br /><br />In order to establish a trust relationship, we usually start from a pilot project for us to know each other better in both technical and commercial aspects. <br />Our staffs are all well educated, holding at least bachelor degree and have many years experience in the operation of offshore software development to meet you needs. <br />We pay much attention to completing project on time and project quality. For example, we use RUP (Rational Unified Process) to manage the development process. <br />During the development, we will submit our progress report on every working day and a weekly report to you by e-mail, including the work completed, and plan for next week. <br />We will keep smooth communications with you during the development process through telephone, fax, e-mail, instant messenger and ip-telephone. <br />The test is always automated to increase accuracy and efficiency by using testing tools, such as Rational Robot or Load Runner <br />How we do it?<br /><br /><br />After receiving the requirement on the software developing, we will provide you a proposal including the estimations of the work amount of the human resources, the cost, and the timeframe. <br />When we get the project, the technicians are swift to analyze and design the system to keep our understanding of requirement consistent with you. <br /><br />We will take time to listen and study the application scopes of the software, your business modes, and business procedures. Then we will offer an analyzing result report and a development blueprint. <br /><br />Led by the project manager, the development team will start the software development according to the development plan and time schedule. <br />We will keep you informed with the status and progress of the development at all stages of the development project process. <br /><br />Having completed the development, we will make repeating tests so as to make the bugs as less as possible.',
        '');
# --------------------------------------------------------
CREATE TABLE enterprise_success_story (
    id                TINYINT(4)   NOT NULL AUTO_INCREMENT,
    family_id         TINYINT(4)   NOT NULL DEFAULT '0',
    project_name      VARCHAR(120) NOT NULL DEFAULT '',
    project_desc      TEXT         NOT NULL,
    technology        VARCHAR(255)          DEFAULT NULL,
    project_desc_long TEXT,
    PRIMARY KEY (id)
)
    ENGINE = ISAM;
INSERT INTO enterprise_success_story
VALUES (1, 1, 'IKANO Application Processing System',
        'The responsiveness and resilience of the Application Processing System are paramount as instant credit is offered on all products. Applications will be processed in real time with a target time of two minutes from start to decision. It offers each retailer the speed at which it can respond to requests for new or altered services.',
        'COM+ ,ASP, JavaScript, SQL Server7.0, Oracle 8i',
        'Project description:\r\n\r\nIKANO Financial Services Ltd., A member of the IKANO Group is located in U.K. IKANO Financial Services offers multi-product credit services to multiple retailers. IKANO\'s key differentiator in the retail credit market is its ability to tailor the service it offers to each retailer and the speed at which it can respond to requests for new or altered services. They were so successful at multi-product credit services that they found they had a large number of applications to fulfill within a short space of time both at IKANO and his retailers. With complicated functions of Data capture and validation, Address targeting, Resolution, Record retrieval, Security and Audit, Shinetech developed the system to realize the application processing with a target time in two minutes from start to decision.\r\n\r\nRunning environment: Windows 2000 Server +(SQL Server7.0 + Oracle 8i)\r\n\r\nDeveloping technology: COM+, ASP, JavaScript (based on VB)\r\n\r\nSystem characteristics:\r\n\r\nDuring the design process, we separated the Business logical layer from the Business presentation layer, which increasing the flexibility and being prone to be expanded. At the same time, we packaged COM+ in the Data access layer, which realizing the result of supporting most large and middle sized database. And we optimized the arithmetic in the Business logic, so the system became more robust and shortcut.\r\n\r\n\r\nSystem key points: \r\n1. Applications are processed both at IKANO by fully skilled Customer Advisors and (via wide area networks) at retail branches by semi-skilled retailer store staff. Application data is also captured over the Internet in a separate system and processed in the Application system separately. \r\n2. The application must support the flexibility and the speed at which it can respond to requests for new or altered services. \r\n3. Address targeting request to alternate the application data with government in order to read and confirm the authenticity of the applicant. \r\n4. All applications are decisioned using bespoke strategies requiring up to the minute in-house maintenance to minimize exposure to fraud and effectively manage risk. \r\n \r\n\r\nTotal number of man-hour of the project: \r\n\r\n14400 man-hours \r\n \r\n');
INSERT INTO enterprise_success_story
VALUES (2, 3, 'On-line Statement Retrieval System',
        'On-line Statement Retrieval System empowers customers to retrieve their statement on client\'s website which includes information in transaction history, balance, Credit limit, etc. In addition, this system offers back-end administration system to administrator.',
        'VC, VB, Java Script, ASP, Microsoft SQL server, Com+, HTML', '<p>More detailed description of this item here ...</p>');
INSERT INTO enterprise_success_story
VALUES (8, 2, 'Newspaper Bulletin Management System',
        'Newspaper Bulletin Management System has realized the management of newspaper bulletins, contracts and sales personnel and has dramatically increased the efficiency of the workflow between departments of the company. The main functions include: Newspaper bulletin management, Management of reservation, Temporary contract management, Contract management, Contract overview and print, Management of sales personnel\'s work, User management, System log management',
        'ASP, COM+, JavaScript, SQL Server',
        '<p class="font"><strong><font color="#CC0000">Newspaper Bulletin Management System</font></strong></p>\r\n\r\n<p><font color="#000099"><strong>Project description:</strong></font></p>\r\n\r\nBeijing Market Development Advertising Co. Ltd provides advertisement, sales promotion of large outdoor advertisement media--- advertisement <br />on newspaper bulletins. The system developed by Shinetech for Beijing <br />Market Development Advertising Co. Ltd satisfactorily meets the <br />requirements of managing newspaper bulletins, contracts and sales <br />personnel and has dramatically increased the efficiency of the workflow <br />between the departments of the company.<br />Running environment: Window 2000 Server + IIS Web Server + SQL Server 7.0<br />Developing technology: ASP, COM+, JavaScript, SQL Server</p><p> <span class="font"><font color="#000099"><strong>System characteristics:</strong></font></span></p><p class="font">The system can cling to the client\'s demand and accord <br />with the operating mechanism of the newspaper bulletin management. <br />The main function - newspaper bulletin column data inquiry, the <br />system offers the abundant inquiring function: flashpoint inquiry, <br />combination inquiry, directional inquiry, suit inquiry and advanced <br />inquiry which can input SQL language; to the one or several newspaper <br />bulletin column which will be sold, the system offers the "locked beforehand" function which avoiding the repeat sell situation; <br />to the whole system management, the manager can add, change, delete <br />and right endow all users, and check, delete and print the system log, etc. Finally, the automatic backup function can effectively ensure the system data safety.</p>\r\n<span class="font"><strong><font color="#000099">System key points:</font></strong></span> \r\n<br />\r\n <table width="100%" border="0" cellpadding="2" cellspacing="0"><tr class="font"> <td width="5%" height="28" align="right" valign="top" class="font">1.</td><td width="95%" valign="top" class="font"> 1. The system supports the network environment, and multiuser can use it at the same time. Meanwhile, it can ensure the disposing efficiency of the newspaper bulletin column system.</td></tr><tr class="font"> <td align="right" valign="top" class="font">2.</td><td valign="top" class="font">The system has high stability. Once the formal system has trouble, the backup system can start in a few minutes.</td></tr><tr class="font"><td height="16" align="right" valign="top" class="font">3.</td><td valign="top" class="font">It adopts nonreversible data authentication technology to ensure the key data safety.</td> </tr><tr class="font"> <td align="right" valign="top" class="font">4.</td> <td valign="top" class="font">The system has high expansibility, which ensuring the later eternally sophistication.</td> </tr></table>\r\n<p><span class="font"><strong><font color="#000099">Total number of man-hour of \r\n the project:</font></strong></span></p><p><span class="font">1080 man-hours</span></p>');
# --------------------------------------------------------
CREATE TABLE enterprise_success_story_family (
    id   TINYINT(4) UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(80)         NOT NULL DEFAULT '',
    PRIMARY KEY (id),
    UNIQUE KEY name (name)
)
    ENGINE = ISAM;
INSERT INTO enterprise_success_story_family
VALUES (1, 'VB/VB.Net/Visual C++/C#');
INSERT INTO enterprise_success_story_family
VALUES (2, ' ASP/ASP.Net/PHP');
INSERT INTO enterprise_success_story_family
VALUES (3, 'WebSphere DB2 LINUX');
INSERT INTO enterprise_success_story_family
VALUES (6, 'Value Suppressed');
