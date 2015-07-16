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
    <select name="category">
        <option value="1">Silver</option>
        <option value="2">Gold</option>
        <option value="3">Diamond</option>
        <option value="4">VIP</option>
    </select>
    <p><?php echo (4*5); ?></p>
    <input type="submit">
</form>