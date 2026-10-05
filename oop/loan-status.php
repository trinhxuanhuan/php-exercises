<?php
enum LoanStatus:string {
    case Borrowed ='borrow';
    case Returned = 'return';
    case Overdue = 'overdue';
}
$status = LoanStatus::Borrowed;
$message = match ($status) {
    LoanStatus::Borrowed => 'Đang mượn' ,
    LoanStatus::Returned =>'Đã trả' ,
    LoanStatus::Overdue => 'Quá hạn',
};
echo "Giá trị trạng thái: ".$status->value .PHP_EOL;
echo "Thông báo: ".$message .PHP_EOL;