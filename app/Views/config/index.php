<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Paramètres Globaux</h3>
    </div>
    <div class="card-body">
        <form action="<?= site_url('config/update') ?>" method="post">
            <div class="form-group">
                <label for="appName">Nom de l'application</label>
                <input type="text" name="application_name" class="form-control" id="appName" placeholder="Entrer le nom de l'application" value="<?= $settings['application_name'] ?? '' ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
