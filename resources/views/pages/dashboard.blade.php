@extends('layouts.app')
@section('content')
<style>
.stat-card {
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
    border-radius: 20px;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1);
}

.stat-card::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 200%;
    height: 200%;
    background: rgba(255,255,255,0.1);
    transform: rotate(45deg);
    z-index: 0;
}

.stat-number {
    font-size: 3.5rem;
    font-weight: 700;
    line-height: 1;
    margin-bottom: 0.2rem;
}

.stat-label {
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    opacity: 0.8;
}

.stat-icon {
    position: absolute;
    right: -20px;
    bottom: -20px;
    font-size: 5rem;
    opacity: 0.2;
    transform: rotate(-15deg);
    transition: all 0.3s ease;
}

.stat-card:hover .stat-icon {
    transform: rotate(0deg) scale(1.1);
    opacity: 0.3;
}

.pulse {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}

.stat-badge {
    background: rgba(255, 255, 255, 0.98);
    border-radius: 15px;
    padding: 4px 10px 4px 4px;
    font-size: 0.75rem;
    font-weight: 500;
    color: #2d3748;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
}

.stat-badge i {
    font-size: 0.7rem;
    width: 20px;
    height: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    color: white;
    transition: transform 0.3s ease;
}

.stat-badge:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.12);
}

.stat-badge:hover i {
    transform: scale(1.1);
}

.badge-success {
    border: 1px solid rgba(72, 187, 120, 0.2);
}

.badge-success i {
    background: linear-gradient(135deg, #48bb78, #38a169);
}

.badge-primary {
    border: 1px solid rgba(66, 153, 225, 0.2);
}

.badge-primary i {
    background: linear-gradient(135deg, #4299e1, #3182ce);
}

.badge-dot {
    font-size: 1rem;
    line-height: 1;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
}

/* Product Overview Styles */
.products-overview {
    margin-top: 2rem;
}

.products-overview-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
    margin-bottom: 1.5rem;
    padding-left: 0.5rem;
    border-left: 4px solid #43cea2;
}

.products-grid {
    display: grid;
    grid-template-columns: repeat(7, 1fr); /* 5 equal columns */
    gap: 1rem;
    padding: 0.5rem;
}

.product-card {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    transition: all 0.3s ease;
    position: relative;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.product-image-wrapper {
    position: relative;
    padding-top: 65%;
    background: #f7fafc;
    overflow: hidden;
}

.product-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.product-card:hover .product-image {
    transform: scale(1.05);
}

.product-info {
    padding: 0.75rem;
    position: relative;
}

.product-category {
    position: absolute;
    top: -10px;
    right: 0.75rem;
    background: rgba(255, 255, 255, 0.9);
    padding: 0.2rem 0.5rem;
    border-radius: 12px;
    font-size: 0.7rem;
    color: #718096;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
}

.product-price {
    color: #2d3748;
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 0.25rem;
}

.product-price span {
    color: #43cea2;
}

.product-name {
    font-size: 0.85rem;
    color: #4a5568;
    margin-bottom: 0.5rem;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.stock-badge {
    font-size: 0.7rem;
    padding: 0.2rem 0.5rem;
    border-radius: 10px;
    background: #ebf8ff;
    color: #3182ce;
    display: inline-block;
}

/* Container for the cards */
.card-container {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1.5rem;
    margin: 2rem 0;
}

/* Individual card styling */
.category-card {
    background: white;
    border-radius: 12px;
    padding: 2rem 1.5rem;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    width: 250px;
    position: relative;
}

.category-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

/* Category Icon */
.category-icon {
    font-size: 3rem;
    color: #43cea2;
    margin-bottom: 1rem;
}

/* Category Title */
.category-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: #2d3748;
    text-transform: uppercase;
    margin: 0;
}

/* Subtle line */
.category-line {
    width: 50px;
    height: 3px;
    background: #43cea2;
    margin: 0.75rem auto 0;
}
</style>

@section('head')
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

<div class="wrapper wrapper-content">
    <div class="row g-4">
        <!-- Orders Card -->
        <div class="col-md-4">
            <div class="stat-card h-100 p-4" style="background: linear-gradient(135deg,rgb(173, 232, 36) 0%, #185a9d 100%);">
                <div class="position-relative z-2">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="stat-label text-white">Orders</span>
                        <div class="stat-badge badge-success">
                            <i class="fa fa-signal"></i>
                            Active
                        </div>
                    </div>
                    <div class="stat-number text-white pulse">{{ $totalOrders ?? 0 }}</div>
                    <div class="stat-label text-white">Total Orders</div>
                </div>
                <i class="fa fa-shopping-cart stat-icon text-white"></i>
            </div>
        </div>

        <!-- Products Card -->
        <div class="col-md-4">
            <div class="stat-card h-100 p-4" style="background: linear-gradient(135deg,rgb(200, 137, 42) 0%,rgb(88, 56, 206) 100%);">
                <div class="position-relative z-2">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="stat-label text-white">Products</span>
                        <div class="stat-badge badge-primary">
                            <i class="fa fa-cube"></i>
                            In Stock
                        </div>
                    </div>
                    <div class="stat-number text-white">{{ $totalProducts ?? 0 }}</div>
                    <div class="stat-label text-white">Total Products</div>
                </div>
                <i class="fa fa-cubes stat-icon text-white"></i>
            </div>
        </div>

        <!-- Customers Card -->
        <div class="col-md-4">
            <div class="stat-card h-100 p-4" style="background: linear-gradient(135deg,rgb(49, 112, 47) 0%,rgb(43, 255, 71) 100%);">
                <div class="position-relative z-2">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <span class="stat-label text-white">Customers</span>
                        <div class="stat-badge badge-success">
                            <i class="fa fa-circle"></i>
                            Active
                        </div>
                    </div>
                    <div class="stat-number text-white">{{ $totalCustomers ?? 0 }}</div>
                    <div class="stat-label text-white">Total Customers</div>
                </div>
                <i class="fa fa-users stat-icon text-white"></i>
            </div>
        </div>
    </div>

    <!-- Added Margin Between Sections -->
    <div class="mt-5"></div>

    <div class="wrapper wrapper-content">
    <!-- Cards Container -->
    <div class="card-container">
        <!-- Fresh Flowers -->
        <div class="category-card">
            <div class="category-icon">
                <i class="fa fa-leaf"></i>
            </div>
            <h3 class="category-title">Fresh Flowers</h3>
            <div class="category-line"></div>
        </div>

        <!-- Dried Flowers -->
        <div class="category-card">
            <div class="category-icon">
                <i class="fa fa-sun-o"></i>
            </div>
            <h3 class="category-title">Dried Flowers</h3>
            <div class="category-line"></div>
        </div>

        <!-- Bouquet Flowers -->
        <div class="category-card">
            <div class="category-icon">
                <i class="fa fa-gift"></i>
            </div>
            <h3 class="category-title">Bouquet Flowers</h3>
            <div class="category-line"></div>
        </div>

        <!-- Artificial Flowers -->
        <div class="category-card">
            <div class="category-icon">
                <i class="fa fa-paint-brush"></i>
            </div>
            <h3 class="category-title">Artificial Flowers</h3>
            <div class="category-line"></div>
        </div>
    </div>
</div>
</div>

@endsection