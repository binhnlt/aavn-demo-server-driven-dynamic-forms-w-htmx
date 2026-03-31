<?php if ($type === 'employee'): ?>

    <!-- Employee: department REQUIRED, employee ID optional -->
    <div class="mb-3">
        <label class="form-label fw-semibold">
            Department
            <span class="badge bg-success ms-1">Validation State: required</span>
        </label>
        <select name="department" class="form-select" required>
            <option value="">-- Select department --</option>
            <?php foreach ($categories as $cat): ?>
                <option value="<?= esc($cat['id']) ?>"
                    hx-get="<?= base_url('dynamic-form/subcategories/' . $cat['id']) ?>"
                    hx-trigger="click"
                    hx-target="#subcategory-select">
                    <?= esc($cat['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">
            Specialization
            <span class="badge bg-secondary ms-1">Validation State: optional</span>
        </label>
        <select name="subcategory" id="subcategory-select" class="form-select">
            <option value="">-- Select specialization --</option>
            <?php foreach ($subcategories as $sub): ?>
                <option value="<?= esc($sub['id']) ?>"><?= esc($sub['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Employee ID <span class="badge bg-secondary ms-1">optional</span></label>
        <input type="text" name="employee_id" class="form-control" placeholder="e.g. EMP-001">
    </div>

<?php elseif ($type === 'freelancer'): ?>

    <!-- Freelancer: specialty REQUIRED, portfolio optional -->
    <div class="mb-3">
        <label class="form-label fw-semibold">
            Area of Expertise
            <span class="badge bg-success ms-1">Validation State: required</span>
        </label>
        <select name="specialty" class="form-select" required>
            <option value="">-- Select specialty --</option>
            <?php foreach ($subcategories as $sub): ?>
                <option value="<?= esc($sub['id']) ?>"><?= esc($sub['name']) ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Portfolio URL <span class="badge bg-secondary ms-1">optional</span></label>
        <input type="url" name="portfolio" class="form-control" placeholder="https://portfolio.example.com">
    </div>

<?php elseif ($type === 'business'): ?>

    <!-- Business: company name + tax ID REQUIRED -->
    <div class="mb-3">
        <label class="form-label fw-semibold">
            Company Name
            <span class="badge bg-success ms-1">Validation State: required</span>
        </label>
        <input type="text" name="company_name" class="form-control" placeholder="Acme Corp Ltd." required>
    </div>
    <div class="mb-3">
        <label class="form-label fw-semibold">
            Tax ID / EIN
            <span class="badge bg-success ms-1">Validation State: required</span>
        </label>
        <input type="text" name="tax_id" class="form-control" placeholder="12-3456789" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Website <span class="badge bg-secondary ms-1">optional</span></label>
        <input type="url" name="website" class="form-control" placeholder="https://company.com">
    </div>

<?php elseif ($type === 'student'): ?>

    <!-- Student: school REQUIRED, student ID optional -->
    <div class="mb-3">
        <label class="form-label fw-semibold">
            School / University
            <span class="badge bg-success ms-1">Validation State: required</span>
        </label>
        <input type="text" name="school" class="form-control" placeholder="MIT, Stanford, ..." required>
    </div>
    <div class="mb-3">
        <label class="form-label">Student ID <span class="badge bg-secondary ms-1">optional</span></label>
        <input type="text" name="student_id" class="form-control" placeholder="2012345">
    </div>

<?php else: ?>

    <div class="alert alert-light border text-muted small">
        <i class="bi bi-arrow-up me-1"></i>Select an account type to reveal the relevant fields.
    </div>

<?php endif; ?>
