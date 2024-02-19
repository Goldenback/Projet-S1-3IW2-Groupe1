<?php if(!empty($errors)):?>
<div style="background-color: red;">
    <?php echo implode("<br>",$errors);?>
</div>
<?php endif;?>

<form
        action="<?= $config["config"]["action"]??"" ?>"
        method="<?= $config["config"]["method"]??"POST" ?>"
        id="<?= $config["config"]["id"]??"" ?>"
        class="<?= $config["config"]["class"]??"" ?>"
>

<?php foreach ($config["inputs"] as $name => $input): ?>
    <?php if ($input["type"] === "select"): ?>
        <label for="<?= $name ?>"><?= $input["label"] ?? ucfirst($name) ?>:</label>
        <select name="<?= $name ?>" id="<?= $input["id"] ?? $name ?>" class="<?= $input["class"] ?? "" ?>" <?= $input["required"] ? "required" : "" ?>>
            <?php foreach ($input["options"] as $optionValue => $optionLabel): ?>
                <option value="<?= $optionValue ?>"><?= $optionLabel ?></option>
            <?php endforeach; ?>
        </select><br>
    <?php else: ?>
        <label for="<?= $name ?>"><?= $input["label"] ?? ucfirst($name) ?>:</label>
        <input
            name="<?= $name ?>"
            type="<?= $input["type"] ?? "text" ?>"
            class="<?= $input["class"] ?? "" ?>"
            id="<?= $input["id"] ?? "" ?>"
            placeholder="<?= $input["placeholder"] ?? "" ?>"
            <?= $input["required"] ? "required" : "" ?>><br>
    <?php endif; ?>
<?php endforeach; ?>



    <input type="submit" value="<?= $config["config"]["submit"]??"Envoyer" ?>">
</form>