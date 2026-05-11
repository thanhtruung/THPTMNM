<?php
require_once 'app/models/ProductModel.php';

class ProductController
{
    private $products = [];

    public function __construct()
    {
        // Giả sử chúng ta lưu trữ sản phẩm trong session để giữ lại khi làm mới trang
        session_start();

        if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
            $_SESSION['products'] = $this->getSampleProducts();
        }

        $this->products = $_SESSION['products'];
    }

    private function getSampleProducts()
    {
        return [
            new ProductModel(1, 'Laptop Asus Vivobook 15 OLED', 'Laptop màn hình OLED 15.6 inch, màu sắc rực rỡ, phù hợp học tập, làm việc văn phòng và chỉnh sửa hình ảnh cơ bản.', 15990000),
            new ProductModel(2, 'Laptop Dell Inspiron 14 Plus', 'Máy tính xách tay thiết kế gọn, hiệu năng ổn định, bàn phím thoải mái và thời lượng pin tốt cho sinh viên.', 18990000),
            new ProductModel(3, 'Laptop HP Pavilion Aero 13', 'Laptop mỏng nhẹ với màn hình 13.3 inch, trọng lượng thấp, thích hợp mang đi học, đi làm và thuyết trình.', 17490000),
            new ProductModel(4, 'Laptop Lenovo IdeaPad Slim 5', 'Laptop văn phòng có vỏ kim loại, vi xử lý tiết kiệm điện, màn hình sắc nét và hệ thống tản nhiệt êm.', 16990000),
            new ProductModel(5, 'Laptop Acer Swift Go 14', 'Ultrabook nhỏ gọn, tốc độ khởi động nhanh, màn hình đẹp và phù hợp người dùng thường xuyên di chuyển.', 16490000),
            new ProductModel(6, 'MacBook Air M2 13 inch', 'Máy tính Apple dùng chip M2, hoạt động yên tĩnh, pin lâu và tối ưu cho học tập, lập trình, thiết kế nhẹ.', 24990000),
            new ProductModel(7, 'MacBook Pro M3 14 inch', 'Laptop cao cấp cho công việc sáng tạo, màn hình Liquid Retina XDR, hiệu năng mạnh và loa chất lượng cao.', 39990000),
            new ProductModel(8, 'Laptop MSI Modern 14', 'Laptop thiết kế tối giản, cấu hình cân bằng, phù hợp nhân viên văn phòng, học sinh và người dùng phổ thông.', 13990000),
            new ProductModel(9, 'Laptop Gaming Asus TUF A15', 'Laptop gaming bền bỉ, card đồ họa rời, màn hình tần số quét cao và hệ thống tản nhiệt tối ưu.', 22990000),
            new ProductModel(10, 'Laptop Gaming Lenovo LOQ 15', 'Máy chơi game có hiệu năng mạnh, bàn phím tốt, nâng cấp dễ và phù hợp cả học tập lẫn giải trí.', 21990000),
            new ProductModel(11, 'Điện thoại iPhone 15', 'Smartphone Apple với thiết kế Dynamic Island, camera sắc nét, chip mạnh và hệ sinh thái iOS ổn định.', 19990000),
            new ProductModel(12, 'Điện thoại iPhone 15 Pro', 'Điện thoại cao cấp khung titan, hiệu năng mạnh, camera chuyên nghiệp và hỗ trợ quay video chất lượng cao.', 27990000),
            new ProductModel(13, 'Điện thoại Samsung Galaxy S24', 'Smartphone Android cao cấp, màn hình Dynamic AMOLED, camera đa dụng và nhiều tính năng AI tiện ích.', 21990000),
            new ProductModel(14, 'Điện thoại Samsung Galaxy A55', 'Điện thoại tầm trung có màn hình đẹp, pin lớn, chống nước nhẹ và camera phù hợp chụp ảnh hằng ngày.', 9990000),
            new ProductModel(15, 'Điện thoại Xiaomi 14', 'Điện thoại hiệu năng cao, sạc nhanh, camera hợp tác Leica và màn hình hiển thị sáng rõ.', 19990000),
            new ProductModel(16, 'Điện thoại Redmi Note 13 Pro', 'Smartphone giá tốt với màn hình AMOLED, camera độ phân giải cao, pin bền và sạc nhanh.', 7490000),
            new ProductModel(17, 'Điện thoại OPPO Reno11', 'Điện thoại thiết kế mỏng, camera chân dung nổi bật, sạc nhanh và phù hợp người thích chụp ảnh.', 10990000),
            new ProductModel(18, 'Điện thoại Vivo V30', 'Smartphone camera selfie đẹp, màn hình cong hiện đại, pin tốt và hiệu ứng chụp chân dung ấn tượng.', 11990000),
            new ProductModel(19, 'Điện thoại Realme 12 Pro', 'Máy Android tầm trung có thiết kế nổi bật, camera zoom, hiệu năng ổn và sạc nhanh tiện lợi.', 8990000),
            new ProductModel(20, 'Điện thoại Nothing Phone 2a', 'Điện thoại thiết kế Glyph độc đáo, giao diện tối giản, màn hình mượt và trải nghiệm Android khác biệt.', 9290000),
            new ProductModel(21, 'Máy tính bảng iPad Gen 10', 'Tablet Apple màn hình lớn, phù hợp học online, ghi chú, xem phim và sử dụng bút cảm ứng.', 9990000),
            new ProductModel(22, 'Máy tính bảng iPad Air M2', 'iPad hiệu năng mạnh, hỗ trợ Apple Pencil, phù hợp thiết kế, học tập và làm việc di động.', 16990000),
            new ProductModel(23, 'Máy tính bảng Samsung Galaxy Tab S9', 'Tablet Android cao cấp có bút S Pen, màn hình AMOLED, chống nước và loa sống động.', 19990000),
            new ProductModel(24, 'Máy tính bảng Xiaomi Pad 6', 'Máy tính bảng cấu hình tốt, màn hình 144Hz, phù hợp giải trí, học tập và ghi chú.', 8990000),
            new ProductModel(25, 'Máy tính bảng Lenovo Tab P12', 'Tablet màn hình lớn, loa chất lượng, pin lâu và hỗ trợ học tập, xem nội dung đa phương tiện.', 8490000),
            new ProductModel(26, 'Tai nghe AirPods Pro 2', 'Tai nghe không dây chống ồn chủ động, âm thanh trong trẻo, xuyên âm tự nhiên và kết nối nhanh với iPhone.', 5990000),
            new ProductModel(27, 'Tai nghe Samsung Galaxy Buds FE', 'Tai nghe true wireless nhỏ gọn, chống ồn ổn, đeo thoải mái và tương thích tốt với điện thoại Samsung.', 1990000),
            new ProductModel(28, 'Tai nghe Sony WF-1000XM5', 'Tai nghe chống ồn cao cấp, âm thanh chi tiết, pin tốt và nhiều tùy chỉnh qua ứng dụng.', 6490000),
            new ProductModel(29, 'Tai nghe JBL Tune Beam', 'Tai nghe Bluetooth có âm bass mạnh, hộp sạc nhỏ, chống nước nhẹ và phù hợp nghe nhạc hằng ngày.', 1890000),
            new ProductModel(30, 'Tai nghe Soundcore Liberty 4', 'Tai nghe true wireless âm thanh giàu chi tiết, chống ồn thông minh và thời lượng pin ấn tượng.', 2790000),
            new ProductModel(31, 'Tai nghe Sony WH-1000XM5', 'Tai nghe chụp tai chống ồn hàng đầu, đeo êm, âm thanh rộng và phù hợp làm việc tập trung.', 7990000),
            new ProductModel(32, 'Tai nghe Bose QuietComfort Ultra', 'Tai nghe over-ear cao cấp, chống ồn mạnh, âm thanh sống động và thiết kế sang trọng.', 9490000),
            new ProductModel(33, 'Tai nghe Logitech G Pro X', 'Tai nghe gaming có micro tháo rời, âm thanh định hướng tốt và khung chắc chắn cho game thủ.', 2990000),
            new ProductModel(34, 'Tai nghe Razer BlackShark V2', 'Headset gaming nhẹ, âm thanh rõ, micro lọc tiếng ồn và đệm tai thoáng khi chơi lâu.', 2490000),
            new ProductModel(35, 'Tai nghe HyperX Cloud III', 'Tai nghe chơi game bền, âm thanh cân bằng, micro chất lượng và tương thích nhiều thiết bị.', 2690000),
            new ProductModel(36, 'Chuột Logitech MX Master 3S', 'Chuột không dây cao cấp, cuộn siêu nhanh, cảm biến chính xác và hỗ trợ làm việc đa thiết bị.', 2490000),
            new ProductModel(37, 'Chuột Logitech G Pro X Superlight', 'Chuột gaming siêu nhẹ, cảm biến chính xác, phản hồi nhanh và được nhiều game thủ chuyên nghiệp sử dụng.', 3290000),
            new ProductModel(38, 'Chuột Razer DeathAdder V3', 'Chuột gaming công thái học, trọng lượng nhẹ, cảm biến cao cấp và nút bấm bền bỉ.', 1890000),
            new ProductModel(39, 'Chuột SteelSeries Rival 5', 'Chuột chơi game nhiều nút phụ, đèn RGB đẹp, cảm biến ổn định và phù hợp game MOBA.', 1590000),
            new ProductModel(40, 'Chuột Microsoft Modern Mobile', 'Chuột không dây nhỏ gọn, thiết kế tối giản, dễ mang theo và phù hợp laptop văn phòng.', 790000),
            new ProductModel(41, 'Bàn phím Keychron K2 Pro', 'Bàn phím cơ không dây layout gọn, hỗ trợ Mac và Windows, switch thay nóng và pin lâu.', 2890000),
            new ProductModel(42, 'Bàn phím Logitech MX Keys S', 'Bàn phím văn phòng cao cấp, phím êm, đèn nền thông minh và kết nối cùng lúc nhiều thiết bị.', 2690000),
            new ProductModel(43, 'Bàn phím Razer Huntsman Mini', 'Bàn phím gaming 60%, switch quang học, phản hồi nhanh và tiết kiệm không gian bàn.', 2490000),
            new ProductModel(44, 'Bàn phím Akko 5075B Plus', 'Bàn phím cơ layout 75%, keycap đẹp, kết nối đa chế độ và âm gõ dễ chịu.', 1990000),
            new ProductModel(45, 'Bàn phím Corsair K70 RGB', 'Bàn phím cơ full-size cho game thủ, khung nhôm chắc, LED RGB mạnh và phím media tiện lợi.', 3690000),
            new ProductModel(46, 'Màn hình Dell UltraSharp U2723QE', 'Màn hình 27 inch 4K, màu sắc chính xác, cổng USB-C và phù hợp thiết kế, văn phòng cao cấp.', 12990000),
            new ProductModel(47, 'Màn hình LG UltraGear 27GP850', 'Màn hình gaming 27 inch QHD, tần số quét cao, phản hồi nhanh và màu sắc đẹp.', 7990000),
            new ProductModel(48, 'Màn hình Samsung Odyssey G5', 'Màn hình cong cho game thủ, độ phân giải QHD, hình ảnh rộng và trải nghiệm chơi game cuốn hút.', 6990000),
            new ProductModel(49, 'Màn hình Asus ProArt PA278QV', 'Màn hình chuyên đồ họa, màu chuẩn, chân đế linh hoạt và phù hợp chỉnh ảnh, dựng video cơ bản.', 7490000),
            new ProductModel(50, 'Màn hình Xiaomi Mi 34 Curved', 'Màn hình cong siêu rộng 34 inch, phù hợp đa nhiệm, chơi game và làm việc nhiều cửa sổ.', 8990000),
            new ProductModel(51, 'Ổ cứng SSD Samsung 990 Pro 1TB', 'SSD NVMe tốc độ cao, phù hợp cài hệ điều hành, game nặng và xử lý dữ liệu lớn.', 2990000),
            new ProductModel(52, 'Ổ cứng SSD WD Black SN850X 1TB', 'Ổ cứng NVMe hiệu năng cao, tối ưu gaming, tốc độ đọc ghi nhanh và độ bền tốt.', 2890000),
            new ProductModel(53, 'Ổ cứng SSD Kingston NV2 1TB', 'SSD NVMe giá hợp lý, nâng cấp laptop dễ dàng, tốc độ tốt cho học tập và văn phòng.', 1590000),
            new ProductModel(54, 'Ổ cứng HDD Seagate BarraCuda 2TB', 'Ổ cứng lưu trữ dung lượng lớn, phù hợp lưu ảnh, video, tài liệu và dữ liệu cá nhân.', 1490000),
            new ProductModel(55, 'Ổ cứng di động WD My Passport 2TB', 'Ổ cứng ngoài nhỏ gọn, kết nối USB, dung lượng lớn và tiện sao lưu dữ liệu khi di chuyển.', 1890000),
            new ProductModel(56, 'RAM Kingston Fury Beast 16GB', 'RAM DDR4 hiệu năng ổn định, tản nhiệt đẹp, phù hợp nâng cấp PC học tập và chơi game.', 990000),
            new ProductModel(57, 'RAM Corsair Vengeance 32GB', 'Bộ nhớ dung lượng lớn cho đa nhiệm, dựng video, lập trình và chạy nhiều ứng dụng cùng lúc.', 2390000),
            new ProductModel(58, 'Mainboard MSI B760M Mortar', 'Bo mạch chủ Intel bền bỉ, nhiều cổng kết nối, hỗ trợ RAM tốc độ cao và tản nhiệt tốt.', 3990000),
            new ProductModel(59, 'Mainboard Asus TUF Gaming B650', 'Bo mạch chủ AMD chất lượng cao, linh kiện bền, hỗ trợ PCIe mới và phù hợp cấu hình gaming.', 4590000),
            new ProductModel(60, 'CPU Intel Core i5-13400F', 'Vi xử lý 10 nhân hiệu năng tốt, phù hợp chơi game, làm việc văn phòng và dựng máy tầm trung.', 4290000),
            new ProductModel(61, 'CPU Intel Core i7-14700K', 'Vi xử lý mạnh cho máy bàn, nhiều nhân luồng, phù hợp render, lập trình và chơi game nặng.', 10990000),
            new ProductModel(62, 'CPU AMD Ryzen 5 7600', 'CPU AMD thế hệ mới, hiệu năng đơn nhân tốt, tiết kiệm điện và phù hợp PC gaming.', 5290000),
            new ProductModel(63, 'CPU AMD Ryzen 7 7800X3D', 'Vi xử lý gaming cao cấp với bộ nhớ đệm lớn, hiệu suất game vượt trội và nhiệt độ ổn.', 9790000),
            new ProductModel(64, 'Card đồ họa RTX 4060 Ti', 'GPU tầm trung hỗ trợ ray tracing, DLSS, tiết kiệm điện và phù hợp chơi game Full HD, 2K.', 10490000),
            new ProductModel(65, 'Card đồ họa RTX 4070 Super', 'Card đồ họa mạnh cho gaming 2K, dựng video, AI cơ bản và trải nghiệm ray tracing mượt.', 16990000),
            new ProductModel(66, 'Card đồ họa RX 7800 XT', 'GPU AMD hiệu năng cao, bộ nhớ lớn, phù hợp gaming 2K và làm việc đồ họa phổ thông.', 13990000),
            new ProductModel(67, 'Nguồn Corsair RM750e', 'Bộ nguồn 750W chuẩn 80 Plus Gold, hoạt động ổn định, dây rời và phù hợp PC gaming.', 2490000),
            new ProductModel(68, 'Tản nhiệt DeepCool AK620', 'Tản nhiệt khí hai tháp, hiệu năng tốt, quạt êm và phù hợp CPU hiệu năng cao.', 1490000),
            new ProductModel(69, 'Router WiFi TP-Link Archer AX55', 'Router WiFi 6 tốc độ cao, phủ sóng tốt, phù hợp gia đình nhiều thiết bị kết nối.', 1990000),
            new ProductModel(70, 'Router Asus RT-AX58U', 'Router WiFi 6 ổn định, nhiều tính năng quản lý mạng, bảo mật tốt và hỗ trợ chơi game.', 2890000),
            new ProductModel(71, 'Mesh WiFi TP-Link Deco X50', 'Hệ thống WiFi mesh phủ sóng rộng, chuyển vùng mượt và phù hợp nhà nhiều tầng.', 3990000),
            new ProductModel(72, 'USB Kingston DataTraveler 128GB', 'USB dung lượng 128GB, nhỏ gọn, tốc độ ổn và tiện lưu tài liệu, nhạc, video.', 390000),
            new ProductModel(73, 'Thẻ nhớ SanDisk Extreme 256GB', 'Thẻ nhớ tốc độ cao, phù hợp quay video 4K, máy ảnh, camera hành trình và điện thoại.', 890000),
            new ProductModel(74, 'Webcam Logitech C920s', 'Webcam Full HD, hình ảnh rõ, micro kép và nắp che riêng tư cho họp online.', 1890000),
            new ProductModel(75, 'Webcam Razer Kiyo X', 'Webcam chất lượng cao cho livestream, màu sắc đẹp, lấy nét nhanh và dễ cài đặt.', 1690000),
            new ProductModel(76, 'Micro HyperX SoloCast', 'Micro USB nhỏ gọn, âm thanh rõ, cắm là dùng và phù hợp học online, stream cơ bản.', 1290000),
            new ProductModel(77, 'Micro Blue Yeti Nano', 'Micro USB cao cấp, thu âm trong, thiết kế đẹp và phù hợp podcast, livestream.', 2590000),
            new ProductModel(78, 'Loa Bluetooth JBL Flip 6', 'Loa di động chống nước, âm bass mạnh, pin tốt và phù hợp du lịch, dã ngoại.', 2790000),
            new ProductModel(79, 'Loa Marshall Emberton II', 'Loa Bluetooth thiết kế cổ điển, âm thanh ấm, pin lâu và kiểu dáng sang trọng.', 4290000),
            new ProductModel(80, 'Loa Soundcore Motion Plus', 'Loa không dây âm lượng lớn, bass chắc, hỗ trợ chống nước và nghe nhạc ngoài trời.', 2390000),
            new ProductModel(81, 'Máy đọc sách Kindle Paperwhite', 'Thiết bị đọc sách màn hình chống chói, pin nhiều tuần, chống nước và lưu được hàng nghìn sách.', 3890000),
            new ProductModel(82, 'Đồng hồ Apple Watch SE 2', 'Smartwatch Apple theo dõi sức khỏe, nhận thông báo, tập luyện và kết nối tốt với iPhone.', 6490000),
            new ProductModel(83, 'Đồng hồ Apple Watch Series 9', 'Đồng hồ thông minh cao cấp, màn hình sáng, đo sức khỏe chính xác và thao tác nhanh.', 9990000),
            new ProductModel(84, 'Đồng hồ Samsung Galaxy Watch 6', 'Smartwatch Android màn hình đẹp, theo dõi giấc ngủ, luyện tập và hỗ trợ nhiều mặt đồng hồ.', 6490000),
            new ProductModel(85, 'Đồng hồ Garmin Forerunner 265', 'Đồng hồ thể thao GPS, màn hình AMOLED, đo chỉ số chạy bộ và pin dài ngày.', 10990000),
            new ProductModel(86, 'Vòng đeo Xiaomi Smart Band 8', 'Vòng tay thông minh giá tốt, theo dõi vận động, nhịp tim, giấc ngủ và pin lâu.', 990000),
            new ProductModel(87, 'Pin sạc dự phòng Anker 20000mAh', 'Pin sạc dung lượng lớn, sạc nhanh, nhiều cổng và phù hợp đi học, đi làm, du lịch.', 1290000),
            new ProductModel(88, 'Pin sạc dự phòng Baseus 30000mAh', 'Sạc dự phòng dung lượng cao, có màn hình hiển thị pin, hỗ trợ nhiều chuẩn sạc nhanh.', 1190000),
            new ProductModel(89, 'Củ sạc Anker Nano 65W', 'Củ sạc GaN nhỏ gọn, công suất 65W, sạc được laptop, điện thoại và máy tính bảng.', 890000),
            new ProductModel(90, 'Cáp USB-C Ugreen 100W', 'Cáp sạc nhanh bền, hỗ trợ công suất cao, truyền dữ liệu ổn và phù hợp nhiều thiết bị.', 290000),
            new ProductModel(91, 'Dock USB-C Baseus 8 in 1', 'Hub mở rộng cho laptop, có HDMI, USB, đọc thẻ, LAN và cổng sạc PD tiện dụng.', 990000),
            new ProductModel(92, 'Ổ cắm thông minh Xiaomi', 'Thiết bị điều khiển điện từ xa, hẹn giờ bật tắt, theo dõi trạng thái qua ứng dụng.', 390000),
            new ProductModel(93, 'Camera an ninh TP-Link Tapo C200', 'Camera WiFi xoay 360 độ, đàm thoại hai chiều, hồng ngoại ban đêm và lưu thẻ nhớ.', 590000),
            new ProductModel(94, 'Camera an ninh Ezviz C6N', 'Camera gia đình có theo dõi chuyển động, hình ảnh Full HD và hỗ trợ xem từ xa.', 690000),
            new ProductModel(95, 'Máy chiếu Wanbo T2 Max', 'Máy chiếu mini Full HD, hệ điều hành thông minh, phù hợp xem phim tại nhà.', 3490000),
            new ProductModel(96, 'Máy chiếu Xiaomi Mi Smart Projector', 'Máy chiếu thông minh thiết kế đẹp, hình ảnh sắc nét, âm thanh tốt và dễ kết nối.', 11990000),
            new ProductModel(97, 'Bộ điều khiển Xbox Wireless', 'Tay cầm chơi game không dây, cầm chắc tay, tương thích PC, console và thiết bị di động.', 1590000),
            new ProductModel(98, 'Tay cầm Sony DualSense', 'Tay cầm PlayStation có rung phản hồi, cò adaptive, thiết kế hiện đại và cảm giác chơi tốt.', 1890000),
            new ProductModel(99, 'Nintendo Switch OLED', 'Máy chơi game cầm tay màn hình OLED, thư viện game phong phú và có thể chơi trên TV.', 7990000),
            new ProductModel(100, 'Steam Deck OLED 512GB', 'Máy chơi game PC cầm tay, màn hình OLED, lưu trữ lớn và chơi được nhiều game Steam.', 14990000),
            new ProductModel(101, 'Kính VR Meta Quest 3', 'Kính thực tế ảo độc lập, hình ảnh sắc nét, trải nghiệm mixed reality và kho ứng dụng phong phú.', 13990000),
        ];
    }

    public function resetData()
    {
        $_SESSION['products'] = $this->getSampleProducts();
        header('Location: /PROJECT1/Product/list');
        exit();
    }

    public function index()
    {
        $this->list();
    }

    public function list()
    {
        // Hiển thị danh sách sản phẩm
        $products = $this->products;
        include 'app/views/product/list.php';
    }

    public function add()
    {
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];

            // Kiểm tra tên sản phẩm
            if (empty($name)) {
                $errors[] = 'Tên sản phẩm là bắt buộc.';
            } elseif (strlen($name) < 10 || strlen($name) > 100) {
                $errors[] = 'Tên sản phẩm phải có từ 10 đến 100 ký tự.';
            }

            // Kiểm tra giá
            if (!is_numeric($price) || $price <= 0) {
                $errors[] = 'Giá phải là một số dương lớn hơn 0.';
            }

            if (empty($errors)) {
                $id = count($this->products) + 1;
                $product = new ProductModel($id, $name, $description, $price);
                $this->products[] = $product;
                $_SESSION['products'] = $this->products;

                header('Location: /PROJECT1/Product/list');
                exit();
            }
        }

        include 'app/views/product/add.php';
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            foreach ($this->products as $key => $product) {
                if ($product->getID() == $id) {
                    $this->products[$key]->setName($_POST['name']);
                    $this->products[$key]->setDescription($_POST['description']);
                    $this->products[$key]->setPrice($_POST['price']);
                    break;
                }
            }

            $_SESSION['products'] = $this->products;
            header('Location: /PROJECT1/Product/list');
            exit();
        }

        foreach ($this->products as $product) {
            if ($product->getID() == $id) {
                include 'app/views/product/edit.php';
                return;
            }
        }

        die('Product not found');
    }

    public function delete($id)
    {
        foreach ($this->products as $key => $product) {
            if ($product->getID() == $id) {
                unset($this->products[$key]);
                break;
            }
        }

        $this->products = array_values($this->products);
        $_SESSION['products'] = $this->products;

        header('Location: /PROJECT1/Product/list');
        exit();
    }
}
?>
