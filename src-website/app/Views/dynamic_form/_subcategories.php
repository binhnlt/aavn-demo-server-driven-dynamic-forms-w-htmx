<option value="">-- Chọn chuyên ngành --</option>
<?php foreach ($subcategories as $sub): ?>
    <option value="<?= esc($sub['id']) ?>"><?= esc($sub['name']) ?></option>
<?php endforeach; ?>
