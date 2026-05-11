<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Studio - Khuyến mãi online</title>
    <link rel="stylesheet" href="/PROJECT1/public/css/style.css">
</head>
<body>
    <header class="topbar">
        <div class="header">
            <a href="/PROJECT1/Product/list" class="logo">
                <span class="logo-icon">✣</span>
                <span>techdidong</span><small>.com</small>
            </a>

            <div class="search">
                <span>🔍</span>
                <input type="text" placeholder="Cơ hội nhận mã giảm 400k">
            </div>

            <a href="/PROJECT1/" class="nav-btn">🏠 Trang chủ</a>
            <a href="/PROJECT1/Product/list" class="nav-btn">🛍️ Product Studio</a>
            <a href="/PROJECT1/Product/add" class="nav-btn">✨ Thêm sản phẩm</a>
        </div>
    </header>

    <aside class="side-ad left">
        <div class="side-sale">SALE SẬP SÀN<br>GIẢM ĐẾN 50%</div>
        <div class="side-product"></div>
        <span class="side-cta">MUA NGAY</span>
    </aside>

    <aside class="side-ad right">
        <div class="side-sale">SALE SẬP SÀN<br>GIẢM ĐẾN 50%</div>
        <div class="side-product"></div>
        <span class="side-cta">MUA NGAY</span>
    </aside>

    <main class="page">
        <section class="hero">
            <div class="hero-sticker">KỶ NGUYÊN<br>MỚI</div>

            <div class="hero-center">
                <h1 class="hero-title">REDMI Watch 6</h1>
                <p class="hero-subtitle">Mở tầm nhìn, bật năng lượng</p>
                <div class="hero-price">
                    <span>Giá chỉ</span>
                    <strong>2.990.000đ</strong>
                    <span>Khi mua kèm</span>
                    <strong>1.990.000đ</strong>
                </div>
            </div>

            <div class="hero-product">
                <div class="watch-band"></div>
                <div class="watch-face one">09</div>
                <div class="watch-face two">10</div>
            </div>
        </section>

        <h2 class="title-row">Khuyến mãi online</h2>

        <section class="sale-section">
            <div class="sale-tabs">
                <div class="tab active"><span class="pill-red">FLASH SALE</span></div>
                <div class="tab"><span class="pill-green">GIẢM ĐẾN 50%</span></div>
                <div class="tab"><span class="pill-orange">ONLINE ONLY<br>GIẢM ĐẾN 50%</span></div>
                <div class="tab">Điện Thoại</div>
                <div class="tab">Apple</div>
                <div class="tab">Laptop</div>
                <div class="tab">Phụ Kiện</div>
                <div class="tab">Đồng Hồ</div>
            </div>

            <div class="countdown-row">
                <div class="countdown-main">
                    <span>Chỉ còn:</span>
                    <span class="time-box" id="hour">00</span>:
                    <span class="time-box" id="minute">30</span>:
                    <span class="time-box" id="second">04</span>
                </div>
                <div class="next-time">Sắp diễn ra<strong>15:00</strong></div>
                <div class="next-time">Sắp diễn ra<strong>18:00</strong></div>
            </div>

            <?php
            function productDeviceClass($name) {
                $lower = mb_strtolower($name, 'UTF-8');

                if (strpos($lower, 'iphone 14') !== false) return 'iphone14';
                if (strpos($lower, 'iphone 15') !== false) return 'iphone15';
                if (strpos($lower, 'iphone 16') !== false) return 'iphone16';
                if (strpos($lower, 'iphone 17') !== false) return 'iphone17';

                if (
                    strpos($lower, 'laptop') !== false ||
                    strpos($lower, 'macbook') !== false ||
                    strpos($lower, 'thinkpad') !== false
                ) return 'laptop';

                if (
                    strpos($lower, 'watch') !== false ||
                    strpos($lower, 'đồng hồ') !== false ||
                    strpos($lower, 'garmin') !== false ||
                    strpos($lower, 'band') !== false
                ) return 'watch';

                if (
                    strpos($lower, 'tai nghe') !== false ||
                    strpos($lower, 'airpods') !== false ||
                    strpos($lower, 'buds') !== false ||
                    strpos($lower, 'headphone') !== false
                ) return 'headphone';

                if (
                    strpos($lower, 'màn hình') !== false ||
                    strpos($lower, 'monitor') !== false
                ) return 'monitor';

                if (
                    strpos($lower, 'iphone') !== false ||
                    strpos($lower, 'samsung') !== false ||
                    strpos($lower, 'xiaomi') !== false ||
                    strpos($lower, 'oppo') !== false ||
                    strpos($lower, 'vivo') !== false ||
                    strpos($lower, 'realme') !== false ||
                    strpos($lower, 'điện thoại') !== false
                ) return 'phone';

                return 'accessory';
            }
            ?>

            <?php if (empty($products)): ?>
                <div style="padding: 30px; text-align:center;">
                    <p>Chưa có sản phẩm nào.</p>
                    <a href="/PROJECT1/Product/resetData" class="buy-btn" style="display:inline-grid;place-items:center;width:180px;">Nạp 100 sản phẩm</a>
                </div>
            <?php else: ?>
                <ul class="product-grid">
                    <?php foreach ($products as $index => $product): ?>
                        <?php
                            $name = $product->getName();
                            $deviceClass = productDeviceClass($name);
                            $price = (float)$product->getPrice();
                            $discount = 3 + ($index % 38);
                            $oldPrice = round($price / (1 - $discount / 100), -3);
                            $stock = 1 + ($index % 30);
                            $total = $stock + 2 + ($index % 18);
                            $stockWidth = max(12, min(98, round($stock / $total * 100)));
                        ?>
                        <li class="product-card">
                            <div class="product-img">
                                <div class="device <?= $deviceClass ?>"></div>
                            </div>

                            <h3 class="product-name">
                                <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>
                            </h3>

                            <div class="price"><?php echo number_format($price, 0, ',', '.'); ?>đ</div>
                            <div class="old-line">
                                <span class="old-price"><?php echo number_format($oldPrice, 0, ',', '.'); ?>đ</span>
                                <span class="discount">-<?= $discount ?>%</span>
                            </div>

                            <div class="stock-bar" style="--stock: <?= $stockWidth ?>%;">
                                <div class="stock-fill"></div>
                                <div class="stock-text">🔥 Còn <?= $stock ?>/<?= $total ?> suất</div>
                            </div>

                            <button class="buy-btn">Mua ngay</button>

                            <div class="admin-actions">
                                <a class="edit-btn" href="/PROJECT1/Product/edit/<?php echo $product->getID(); ?>">Sửa</a>
                                <a class="delete-btn"
                                   href="/PROJECT1/Product/delete/<?php echo $product->getID(); ?>"
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">Xóa</a>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </section>
    </main>

    <div class="chat-bubble">
        <strong>⚡ Tech Di Động</strong>
        Em rất sẵn lòng hỗ trợ Anh/Chị 😊
    </div>
    <div class="chat-icon">🤖</div>

    <script>
        let totalSeconds = 30 * 60 + 4;

        function updateCountdown() {
            const h = Math.floor(totalSeconds / 3600);
            const m = Math.floor((totalSeconds % 3600) / 60);
            const s = totalSeconds % 60;

            document.getElementById('hour').textContent = String(h).padStart(2, '0');
            document.getElementById('minute').textContent = String(m).padStart(2, '0');
            document.getElementById('second').textContent = String(s).padStart(2, '0');

            totalSeconds = totalSeconds > 0 ? totalSeconds - 1 : 30 * 60 + 4;
        }

        updateCountdown();
        setInterval(updateCountdown, 1000);
    </script>
</body>
</html>
