<form method="post" action="<?= $this->Url->build(['action' => 'submit']); ?>">
    <label>Name:</label>
    <input type="text" name="name" required>
    <br>
    <label>Email:</label>
    <input type="email" name="email" required>
    <br>
    <input type="submit" value="Submit">
</form>
