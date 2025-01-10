<?php 
require_once '../config/database.php';
require_once '../includes/header.php';
?>

<div class="container mt-4">
    <h1>Pricing</h1>
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Basic</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title text-center">$10<small>/month</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>✓ 100 items</li>
                        <li>✓ Basic analytics</li>
                        <li>✓ Email support</li>
                    </ul>
                    <button class="btn btn-lg btn-block btn-outline-primary w-100">Get started</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Pro</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title text-center">$25<small>/month</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>✓ Unlimited items</li>
                        <li>✓ Advanced analytics</li>
                        <li>✓ Priority support</li>
                    </ul>
                    <button class="btn btn-lg btn-block btn-primary w-100">Get started</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Enterprise</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title text-center">$50<small>/month</small></h1>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li>✓ Unlimited items</li>
                        <li>✓ Custom analytics</li>
                        <li>✓ 24/7 support</li>
                    </ul>
                    <button class="btn btn-lg btn-block btn-primary w-100">Contact us</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>