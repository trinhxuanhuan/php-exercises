# Nhật ký học PHP/Laravel

## Day 1 — PHP cơ bản

### Đã học
- Biến, kiểu dữ liệu, so sánh == và ===.
- Điều kiện, vòng lặp, mảng và foreach.
- Hàm, tham số, return, trim và require.
- Thực hành FizzBuzz.
- Đếm từ bằng trim(), preg_split() và count().
- Nhóm sách theo tác giả, hiển thị bằng hai vòng foreach.
- Sắp xếp tăng/giảm bằng usort() và hàm so sánh.
- Thiết lập PHP, Composer, MySQL và Git.
- Commit và push bài tập lên GitHub.

### Lỗi đã gặp và cách sửa
- Nhầm $books với $book khi duyệt mảng: dùng đúng biến nhận phần tử.
- Thêm PHP_EOL hai lần: chỉ xuống dòng ở nơi hiển thị.
- VS Code không tìm thấy PHP: thêm đường dẫn PHP vào PATH.

### Cần luyện thêm
- Cần luyện viết thêm bài nhóm mảng và sắp xếp khác

## Day 2 — PHP hướng đối tượng

### Đã học
- Class, đối tượng, thuộc tính, phương thức và $this.
- Constructor và constructor property promotion.
- public, private, readonly và kiểu trả về.
- Interface, abstract class và trait.
- Enum, match, null-safe operator và toán tử ??.
- declare(strict_types=1).
- Exception: throw, try, catch và getMessage().
- Namespace và Composer autoload PSR-4.
- PHPUnit: assertions và kiểm tra exception.

### Đã thực hiện
- Viết các ví dụ OOP riêng.
- Thực hành nhập danh sách sách và kiểm tra dữ liệu.
- Xây dựng mini project gồm Book, Member và Loan.
- Dùng interface Borrowable và trait HasTimestamps.
- Mượn sách giảm số bản; hết sách thì từ chối tạo phiếu.
- Trả sách tăng số bản và đổi trạng thái phiếu.
- Ngăn trả cùng phiếu hai lần.
- Viết 5 test PHPUnit.

### Kết quả kiểm thử
- PHPUnit báo: OK (5 tests, 8 assertions).
- Các trường hợp đã kiểm tra:
  1. Mượn thành công.
  2. Không mượn được sách hết bản.
  3. Trả sách thành công.
  4. Không trả cùng phiếu hai lần.
  5. Không tạo sách có số bản âm.

### Lỗi đã gặp và cách sửa
- Thiếu dấu $ trước this: sửa thành $this.
- Nhầm tên thuộc tính và phương thức trong getter: trả đúng thuộc tính.
- Viết prs-4 thay vì psr-4: sửa composer.json và chạy composer dump-autoload.
- Truyền null vào tham số string: phân biệt đối tượng null với thuộc tính null.
- Composer nhận sai dấu ^ trong PowerShell: dùng khoảng phiên bản ~12.0.
- Không giải nén được thư viện: bật extension ZIP rồi chạy composer install.

### Cần luyện thêm
- Tự giải thích và viết lại luồng Book–Member–Loan.
- Phân biệt vai trò interface, abstract class và trait.
- Tự viết test cho trường hợp mới.
- Các bài được hoàn thành với hướng dẫn, chưa tự triển khai toàn bộ.

### Kế hoạch tiếp theo
- Commit và push sản phẩm Day 2.
- Review các phần còn yếu trước khi chuyển sang Day 3.