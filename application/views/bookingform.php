<head>
<link type="text/css" rel="stylesheet" href="<?php echo base_url('assets'); ?>/styles/bootstrap.min.css">
</head>

Silver : <?php echo (20-$silver); ?>

<?php echo validation_errors();?>
<form action="<?php echo site_url('booking/confirmation') ?>">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="contactnumber" placeholder="Contact" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="quantity" placeholder="Quantity" required>
    <select name="category" >
        <option value="silver">Silver</option>
        <option value="gold">Gold</option>
        <option value="diamond">Diamond</option>
        <option value="vip">VIP</option>
    </select>
    <input type="submit">
</form>