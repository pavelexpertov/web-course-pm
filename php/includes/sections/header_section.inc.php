<!-- This is a header section that will contain:
- Logo
- Login section (which needs to be implemented so it's either a button or user's name as an include file)
- navigation link to different parts of the sites
- a simple search bar (which needs to be implemented as an include) -->
<header>
    <!-- <img id="header_logo"> -->
    <h1>CoderConf</h1>
    <nav>
        <ul>
            <li> <a href="index.php">Home</a></li>
            <li> <a href="search.php">Search</a></li>
            <li> <a href="speakers_list.php">Speakers</a></li>
            <!-- The login section goes here -->
            <ul style="float:right;list-style-type:none;">
                <?php include 'php/includes/web_comp/login_small_section.inc.php'; ?>
                <!-- The simple search bar goes here -->
                <?php include 'php/includes/web_comp/simple_searchbar.inc.php'; ?>
            </ul>
        </ul>
    </nav>


</header>
