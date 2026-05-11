<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="/PROJECT1/public/css/style.css">
    <script>
        function validateForm() {
            let name = document.getElementById('name').value;
            let price = document.getElementById('price').value;
            let errors = [];

            if (name.length < 10 || name.length > 100) {
                errors.push('Tên sản phẩm phải có từ 10 đến 100 ký tự.');
            }

            if (price <= 0 || isNaN(price)) {
                errors.push('Giá phải là một số dương lớn hơn 0.');
            }

            if (errors.length > 0) {
                alert(errors.join('\n'));
                return false;
            }

            return true;
        }
    </script>
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
                <h1>Thêm sản phẩm mới</h1>

                <?php if (!empty($errors)): ?>
                    <div class="error-box">
                        <strong>Cần kiểm tra lại:</strong>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form method="POST" action="/PROJECT1/Product/add" onsubmit="return validateForm();" class="form-grid">
                    <div class="form-group">
                        <label for="name">Tên sản phẩm</label>
                        <input type="text" id="name" name="name" placeholder="Ví dụ: iPhone 16 256GB" required>
                    </div>

                    <div class="form-group">
                        <label for="description">Mô tả</label>
                        <textarea id="description" name="description" placeholder="Nhập mô tả sản phẩm..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="price">Giá</label>
                        <input type="number" id="price" name="price" step="0.01" placeholder="Ví dụ: 22390000" required>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
                        <a href="/PROJECT1/Product/list" class="btn btn-muted">Quay lại Product Studio</a>
                    </div>
                </form>
            </section>
        </div>
    </main>
</body>
</html>
