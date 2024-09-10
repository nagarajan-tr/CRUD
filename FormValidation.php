<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="script.js"> -->
    <style>
        label {
            font-weight: bold;
        }

        #save {
            font-weight: bold;
        }

        #update {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-3" id="container" style="background: #c8efff; ">
        <form action="DatabaseFormValid.php" method="post" id="form">
            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-md-4">Firstname</label>
                        <div class="col-md-8">
                            <input type="text" name="fname" id="fname" class="form-control fname" required><br>
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-md-4">Lastname</label>
                        <div class="col-md-8">
                            <input type="text" name="lname" id="lname" class="form-control lname">
                        </div>
                    </div>
                    <div class="form-group row mt-2">
                        <label class="col-form-label col-md-4">Gender</label>
                        <div class="col-md-8">
                            <div class="radio-group">
                                <input type="radio" name="gender" id="male" value="male"> Male
                                <input type="radio" name="gender" id="female" value="female"> Female <br>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mt-2">
                        <label class="col-form-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="email" name="email" id="email" class="form-control email">
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="form-group row mt-3">
                        <label class="col-form-label col-md-4">Date of Birth</label>
                        <div class="col-md-8">
                            <input type="date" name="dob" id="dob" class="form-control dob">
                        </div>
                    </div>
                    <div class="form-group row  mt-3">
                        <label class="col-form-label col-md-4">Age</label>
                        <div class="col-md-8">
                            <input type="text" name="age" id="age" class="form-control age">
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-form-label col-md-4">Address</label>
                        <div class="col-md-8">
                            <textarea name="address" id="address" class="form-control address"></textarea>
                        </div>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group row mt-3">
                        <label class="col-label-form col-md-4">Phone</label>
                        <div class="col-md-8">
                            <input type="text" name="phone" id="phone" class="form-control phone">
                        </div>
                    </div>
                    <div class="form-group row mt-3  ">
                        <label class="col-label-form col-md-4">Degree</label><br>
                        <div class="col-md-8">
                            <select name="degree" id="degree" class="form-select">
                                <option value="select">Select</option>
                                <option value="ug">UG</option>
                                <option value="pg">PG</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-label-form col-md-4">Departments</label><br>
                        <div class="col-md-8">
                            <select name="departments" id="departments" class="form-select">
                                <option value="select">Select you department</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-md-3"></div>
                    <div class="col-md-3 text-center">
                        <input type="submit" value="Save" class="btn btn-secondary" id="save">
                    </div>
                    <div class="col-md-3 text-center">
                        <input type="button" value="Update" class="btn btn-secondary" id="update">
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </form>

    </div>
    <table class="table mt-4 table-bordered table-striped table-hover text-center" id="table1">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Address</th>
                <th>phone</th>
                <th>Degree</th>
                <th>department</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>

        $(document).ready(function () {

            showEmployee();
            const departmentOptions = {
                ug: [
                    { value: 'cs', text: 'Computer Science' },
                    { value: 'it', text: 'Information Technology' },
                    { value: 'ece', text: 'Electronics and Communication Engineering' }
                ],
                pg: [
                    { value: 'mba', text: 'Master of Business Administration' },
                    { value: 'mtech', text: 'Master of Technology' },
                    { value: 'msc', text: 'Master of Science' }
                ]
            };
            $('#degree').change(function () {
                const selectedDegree = $(this).val();
                const $departments = $('#departments');
                $departments.empty();
                $departments.append('<option value="select">Select you deparments</option>');
                if (selectedDegree !== 'select') {
                    const departments = departmentOptions[selectedDegree];
                    departments.forEach(function (department) {
                        $departments.append(`<option value="${department.value}">${department.text}</option>`);
                    });
                }
            });

            $("#dob").on("change", function () {
                let selectedDate = new Date($(this).val());
                let TodayDate = new Date();

                let age = TodayDate.getFullYear() - selectedDate.getFullYear();
                let monthDifference = TodayDate.getMonth() - selectedDate.getMonth();

                if (monthDifference < 0 || monthDifference === 0 && TodayDate.getDate() < selectedDate.getDate()) {
                    age--;
                }
                $("#age").val(age);
            });

            function showEmployee() {
                $.ajax({
                    type: "POST",
                    url: "select.php",
                    cache: false,
                    success: function (response) {
                        console.log(response);
                        $('#tbody').html(response).css("font-weight", "bold");
                        $('#table1 tbody tr').find('td:nth-child(1)').hide();
                    }
                });

            }
            $('#table1 thead th:nth-child(1)').hide();


            $("#table1").on("click", "#edit", function () {
                var row = $(this).closest("tr");
                var id = row.find("td:eq(0)").text().trim();
                var firstname = row.find("td:eq(1)").text().trim();
                var lastname = row.find("td:eq(2)").text().trim();
                var gender = row.find("td:eq(3)").text().trim();
                var email = row.find("td:eq(4)").text().trim();
                var dob = row.find("td:eq(5)").text().trim();
                var age = row.find("td:eq(6)").text().trim();
                var address = row.find("td:eq(7)").text().trim();
                var phone = row.find("td:eq(8)").text().trim();
                var degree = row.find("td:eq(9)").text().trim();
                var departments = row.find("td:eq(10)").text().trim();

                // $()
                $("#fname").val(firstname);
                $("#lname").val(lastname);
                // $("#gender").val(gender);
                if (gender.toLowerCase() === 'male') {
                    $("#male").prop("checked", true);
                } else if (gender.toLowerCase() === 'female') {
                    $("#female").prop("checked", true);
                }
                $("#email").val(email);
                $("#dob").val(dob);
                $("#age").val(age);
                $("#address").val(address);
                $("#phone").val(phone);
                $("#degree").val(degree);
                $("#departments").val(departments);

                $('#form').data('id', id);


                $("#update").on("click", function () {
                    var id = $('#form').data('id');
                    var firstname = $("#fname").val();
                    var lastname = $("#lname").val();
                    // var gender = $("#gender").val();
                    var gender = $("input[name='gender']:checked").val();
                    var email = $("#email").val();
                    var dob = $("#dob").val();
                    var age = $("#age").val();
                    var address = $("#address").val();
                    var phone = $("#phone").val();
                    var degree = $("#degree").val();
                    var departments = $("#departments").val();

                    // $('#form').data(id);
                    $.ajax({
                        url: "update.php",
                        type: "POST",
                        data: {
                            id: id,
                            firstname: firstname,
                            lastname: lastname,
                            gender: gender,
                            email: email,
                            dob: dob,
                            age: age,
                            address: address,
                            phone: phone,
                            degree: degree,
                            departments: departments
                        },
                        success: function (response, status) {
                            console.log("Server Response: " + response);
                            if (status == "success") {
                                alert("Record updated successfully");
                                showEmployee();
                                $("#fname").val("");
                                $("#lname").val("");
                                $("input[name='gender']").prop("checked", false);
                                $("#email").val("");
                                $("#dob").val("");
                                $("#age").val("");
                                $("#address").val("");
                                $("#phone").val("");
                                $("#degree").val("");
                                $("#departments").val("");

                            } else {
                                alert("Error updating record: " + response);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX Error:", status, error);
                            alert("Could not connect to the server.");
                        }
                    });
                });
            });


            $("#table1").on("click", "#delete", function () {
                var row = $(this).closest("tr");
                var email = row.find("td:eq(4)").text().trim();
                if (confirm("Are you sure you want to delete this record?")) {
                    $.ajax({
                        url: "delete.php",
                        type: "POST",
                        data: { email: email },
                        success: function (response, status) {
                            console.log("Server Response:", response);
                            if (status == "success") {
                                row.remove();
                                alert("Data deleted successfully!!");
                            } else {
                                alert("Could not delete the row: " + response);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX Error:", status, error); // Log AJAX errors
                            alert("Could not connect to the server.");
                        }
                    });
                }
            });

        });
    </script>
</body>

</html>