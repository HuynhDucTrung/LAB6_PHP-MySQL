<?php
include 'db.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Quản Lý Sinh Viên</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        /* Your CSS styles here */
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
        }

        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }

        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }

        .table-title .btn-group {
            float: right;
        }

        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }

        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }

        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }

        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
            outline: none !important;
        }

        table.table td a:hover {
            color: #2196F3;
        }

        table.table td a.edit {
            color: #FFC107;
        }

        table.table td a.delete {
            color: #F44336;
        }

        table.table td a.view {
            color: #03A9F4;
        }

        table.table td i {
            font-size: 19px;
        }

        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a,
        .pagination li.active a.page-link {
            background: #03A9F4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }

        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }

        /* Custom checkbox */
        .custom-checkbox {
            position: relative;
        }

        .custom-checkbox input[type="checkbox"] {
            opacity: 0;
            position: absolute;
            margin: 5px 0 0 3px;
            z-index: 9;
        }

        .custom-checkbox label:before {
            width: 18px;
            height: 18px;
        }

        .custom-checkbox label:before {
            content: '';
            margin-right: 10px;
            display: inline-block;
            vertical-align: text-top;
            background: white;
            border: 1px solid #bbb;
            border-radius: 2px;
            box-sizing: border-box;
            z-index: 2;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            content: '';
            position: absolute;
            left: 6px;
            top: 3px;
            width: 6px;
            height: 11px;
            border: solid #000;
            border-width: 0 3px 3px 0;
            transform: inherit;
            z-index: 3;
            transform: rotateZ(45deg);
        }

        .custom-checkbox input[type="checkbox"]:checked+label:before {
            border-color: #03A9F4;
            background: #03A9F4;
        }

        .custom-checkbox input[type="checkbox"]:checked+label:after {
            border-color: #fff;
        }

        .custom-checkbox input[type="checkbox"]:disabled+label:before {
            color: #b8b8b8;
            cursor: auto;
            box-shadow: none;
            background: #ddd;
        }

        /* Modal styles */
        .modal .modal-dialog {
            max-width: 400px;
        }

        .modal .modal-header,
        .modal .modal-body,
        .modal .modal-footer {
            padding: 20px 30px;
        }

        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }

        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }

        .modal .modal-title {
            display: inline-block;
        }

        .modal .form-control {
            border-radius: 2px;
            box-shadow: none;
            border-color: #dddddd;
        }

        .modal textarea.form-control {
            resize: vertical;
        }

        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }

        .modal form label {
            font-weight: normal;
        }
    </style>
    <script>
        $(document).ready(function() {
            // Activate tooltip
            $('[data-toggle="tooltip"]').tooltip();

            // Select/Deselect checkboxes
            var checkbox = $('table tbody input[type="checkbox"]');
            $("#selectAll").click(function() {
                if (this.checked) {
                    checkbox.each(function() {
                        this.checked = true;
                    });
                } else {
                    checkbox.each(function() {
                        this.checked = false;
                    });
                }
            });
            checkbox.click(function() {
                if (!this.checked) {
                    $("#selectAll").prop("checked", false);
                }
            });
        });

        $('#viewStudentModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var name = button.data('name')
            var email = button.data('email')
            var address = button.data('address')
            var phone = button.data('phone')
            var birthdate = button.data('birthdate')
            var modal = $(this)
            modal.find('.modal-body #view-name').text(name)
            modal.find('.modal-body #view-email').text(email)
            modal.find('.modal-body #view-address').text(address)
            modal.find('.modal-body #view-phone').text(phone)
            modal.find('.modal-body #view-birthdate').text(birthdate)
        });

        $('#editStudentModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var email = button.data('email')
            var address = button.data('address')
            var phone = button.data('phone')
            var birthdate = button.data('birthdate')
            var modal = $(this)
            modal.find('.modal-body #edit-id').val(id)
            modal.find('.modal-body #edit-name').val(name)
            modal.find('.modal-body #edit-email').val(email)
            modal.find('.modal-body #edit-address').val(address)
            modal.find('.modal-body #edit-phone').val(phone)
            modal.find('.modal-body #edit-birthdate').val(birthdate)
        });

        $('#deleteStudentModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #delete-id').val(id)
        });
    </script>
</head>

<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản Lý <b>Sinh Viên</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addStudentModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm Sinh Viên</span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>Tên</th>
                            <th>Email</th>
                            <th>Địa Chỉ</th>
                            <th>Điện Thoại</th>
                            <th>Ngày Sinh</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) : ?>
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox<?php echo $row['id']; ?>" name="options[]" value="<?php echo $row['id']; ?>">
                                        <label for="checkbox<?php echo $row['id']; ?>"></label>
                                    </span>
                                </td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['birthdate']; ?></td>
                                <td>
                                    <a href="#viewStudentModal" class="view" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-email="<?php echo $row['email']; ?>" data-address="<?php echo $row['address']; ?>" data-phone="<?php echo $row['phone']; ?>" data-birthdate="<?php echo $row['birthdate']; ?>"><i class="material-icons" data-toggle="tooltip" title="Xem">&#xE417;</i></a>
                                    <a href="#editStudentModal" class="edit" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-email="<?php echo $row['email']; ?>" data-address="<?php echo $row['address']; ?>" data-phone="<?php echo $row['phone']; ?>" data-birthdate="<?php echo $row['birthdate']; ?>"><i class="material-icons" data-toggle="tooltip" title="Sửa">&#xE254;</i></a>
                                    <a href="#deleteStudentModal" class="delete" data-toggle="modal" data-id="<?php echo $row['id']; ?>" data-name="<?php echo $row['name']; ?>" data-email="<?php echo $row['email']; ?>" data-address="<?php echo $row['address']; ?>" data-phone="<?php echo $row['phone']; ?>" data-birthdate="<?php echo $row['birthdate']; ?>"><i class="material-icons" data-toggle="tooltip" title="Xóa">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Hiển thị <b><?php echo $result->num_rows; ?></b> trên <b><?php echo $result->num_rows; ?></b> mục</div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Modal HTML -->
    <div id="addStudentModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="add.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm Sinh Viên</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <textarea name="address" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Điện Thoại</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Ngày Sinh</label>
                            <input type="date" name="birthdate" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                        <input type="submit" class="btn btn-success" value="Thêm">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editStudentModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="edit.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Sửa Sinh Viên</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit-id">
                        <div class="form-group">
                            <label>Tên</label>
                            <input type="text" name="name" id="edit-name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" id="edit-email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Địa Chỉ</label>
                            <textarea name="address" id="edit-address" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Điện Thoại</label>
                            <input type="text" name="phone" id="edit-phone" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Ngày Sinh</label>
                            <input type="date" name="birthdate" id="edit-birthdate" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                        <input type="submit" class="btn btn-info" value="Lưu">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteStudentModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="delete.php" method="POST">
                    <div class="modal-header">
                        <h4 class="modal-title">Xóa Sinh Viên</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Bạn có chắc chắn muốn xóa các mục này?</p>
                        <p class="text-warning"><small>Thao tác này không thể hoàn tác.</small></p>
                        <input type="hidden" name="id" id="delete-id">
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                        <input type="submit" class="btn btn-danger" value="Xóa">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- View Modal HTML -->
    <div id="viewStudentModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Xem Chi Tiết Sinh Viên</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p><strong>Tên:</strong> <span id="view-name"></span></p>
                    <p><strong>Email:</strong> <span id="view-email"></span></p>
                    <p><strong>Địa Chỉ:</strong> <span id="view-address"></span></p>
                    <p><strong>Điện Thoại:</strong> <span id="view-phone"></span></p>
                    <p><strong>Ngày Sinh:</strong> <span id="view-birthdate"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#viewStudentModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var name = button.data('name')
            var email = button.data('email')
            var address = button.data('address')
            var phone = button.data('phone')
            var birthdate = button.data('birthdate')
            var modal = $(this)
            modal.find('.modal-body #view-name').text(name)
            modal.find('.modal-body #view-email').text(email)
            modal.find('.modal-body #view-address').text(address)
            modal.find('.modal-body #view-phone').text(phone)
            modal.find('.modal-body #view-birthdate').text(birthdate)
        });

        $('#editStudentModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var email = button.data('email')
            var address = button.data('address')
            var phone = button.data('phone')
            var birthdate = button.data('birthdate')
            var modal = $(this)
            modal.find('.modal-body #edit-id').val(id)
            modal.find('.modal-body #edit-name').val(name)
            modal.find('.modal-body #edit-email').val(email)
            modal.find('.modal-body #edit-address').val(address)
            modal.find('.modal-body #edit-phone').val(phone)
            modal.find('.modal-body #edit-birthdate').val(birthdate)
        });

        $('#deleteStudentModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)
            modal.find('.modal-body #delete-id').val(id)
        });
    </script>
</body>

</html>

<?php
$conn->close();
?>