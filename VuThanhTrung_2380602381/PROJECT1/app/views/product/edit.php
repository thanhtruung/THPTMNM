<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa sản phẩm</title>
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

    <main class="form-page">
        <div class="form-shell">
            <section class="form-card">
                <h1>Sửa sản phẩm</h1>

                <form method="POST" action="/PROJECT1/Product/edit/<?php echo $product->getID(); ?>" class="form-grid">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" id="name" name="name"
                               value="<?php echo htmlspecialchars($product->getName(), ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea id="description" name="description" required><?php echo htmlspecialchars($product->getDescription(), ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="number" id="price" name="price"
                               value="<?php echo htmlspecialchars($product->getPrice(), ENT_QUOTES, 'UTF-8'); ?>" required>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Lưu thay đổi</button>
                        <a href="/PROJECT1/Product/list" class="btn btn-muted">Quay lại Product Studio</a>
                    </div>
                </form>
            </section>
        </div>
    </main>
</body>
</html>
