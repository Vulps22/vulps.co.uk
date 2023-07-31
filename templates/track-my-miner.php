<?php 
    $USER_AGENT = "ajmcallister-portfolio";// Change this!
    $REQUEST_URL = "https://api.spiget.org/v2/resources/110943";

    $ch = curl_init($REQUEST_URL);
    curl_setopt($ch, CURLOPT_USERAGENT, $USER_AGENT); // Set User-Agent
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $code = curl_getinfo($ch)["http_code"];
    if ($code !== 200) {
        // TODO: handle error code
    }
    curl_close($ch);

    $data = json_decode($result, true);
    // TODO: process data

    //fetch version information
    $ch = curl_init($REQUEST_URL . '/versions');
    curl_setopt($ch, CURLOPT_USERAGENT, $USER_AGENT); // Set User-Agent
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $code = curl_getinfo($ch)["http_code"];
    if ($code !== 200) {
        // TODO: handle error code
    }
    curl_close($ch);

    $versions = json_decode($result, true);
    // TODO: process data
    

?>
<div class="container-fluid pt-5">
<div class="row align-items-center">
    <!-- Plugin card at the top -->
    <div class="col-2 pl-5">
        <div class="card p-0 p-lg-4" style="width:18rem">
            <img src="img/trackMyMiner-banner-card.png" class="card-img-top pb-3" style="width:100%; height:100%;">
            <div class="card-title text-center"><h3><?php echo $data['name']; ?></h3><span><sup><?php echo $data['tag'] ?></sup></span></div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong> Downloads: </strong> <?php echo $data['downloads'] ?></li>
                <li class="list-group-item"><strong>Releases:</strong> <?php echo count($data['versions']) ?></li>
                <li class="list-group-item"><strong>Rating: </strong> <?php echo $data['rating']['average'] ?> Stars</li>
            </ul>
            <div class="card-footer bg-transparent d-grid">
                <a href="<?php echo $data['sourceCodeLink']; ?>" class="btn btn-outline-primary">View Source Code</a>
            </div>
        </div>
    </div>

    <div class="col offset-lg-1">
    <p>TrackMyMiner is a plugin I developed to address the issue of "xray cheaters" using xray packs in Minecraft. The idea for TrackMyMiner came from a server owner who needed a trustworthy solution after the previous plugin's developer proved to be untrustworthy.</p>
    <p>I designed this powerful tool to help server administrators catch suspicious players who may be using xray hacks to locate hidden ores. When a player mines an excessive number of ores in a short time, the plugin sends a notification to admins, alerting them to potential foul play. To further investigate, administrators can use the plugin to discreetly "spy" on the player and view their inventories.</p>
    <p>During development, I built TrackMyMiner using Java and integrated it with the Spigot API. The process was challenging, as I had to learn everything from scratch, but the result was a robust and efficient plugin.</p>
    <p>I poured significant effort into understanding Spigot's documentation to ensure a seamless integration of various functionalities into the plugin's architecture.</p>
    <p>Since its creation, TrackMyMiner has been deployed on 16 servers, making a positive impact on maintaining fair gameplay environments. Its effectiveness and value have been recognized by the Minecraft community.</p>
    <p>As the developer of TrackMyMiner, I am committed to its ongoing maintenance and compatibility with future Minecraft and Spigot releases. I actively keep an eye on updates and improvements, with the goal of incorporating new features that enhance the plugin's capabilities.</p>
    <p>You can track the plugin's usage at <a href="https://bstats.org/plugin/bukkit/TrackMyMiner/18987">bStats</a>. I take pride in creating TrackMyMiner, a powerful tool that helps administrators uphold fairness and ensure an enjoyable experience for all Minecraft enthusiasts.</p>
    </div>
    <div class="col-lg-3"></div>
</div>

<!-- Cards at the bottom for plugin versions -->
<div class="container pt-5">
    <div class="row">
        <?php foreach (array_reverse($versions) as $version) {
            $latest = false;
            $download = "$REQUEST_URL/versions/$version[id]/download";
            if ($version['id'] === $data['version']['id']) {
                $latest = true;
            }
            ?>
            <div class="col-lg-3 align-items-center d-flex align-items-stretch pb-2">
                <div class="card">
                    <div class="card-title text-center">
                        <h3><?php echo 'Version ' . $version['name']; ?></h3>
                        <?php echo ($latest) ? '<span class="badge bg-success text-small">Latest</span>' : '<br>'; ?>
                    </div>
                    <div class="card-footer bg-transparent d-grid">
                        <?php if ($version['name'] === '1.1'): ?>
                            <button class="btn btn-outline-primary" disabled>Download <sup class="badge bg-danger">Removed</sup></button>
                        <?php else: ?>
                            <a href="<?php echo $download; ?>" class="btn btn-outline-primary">Download</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</div>


