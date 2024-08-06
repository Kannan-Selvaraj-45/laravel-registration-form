<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        /* Custom Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            color: #333;
        }
        .container-fluid {
            padding: 30px 15px;
        }
        .header {
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            padding: 15px 30px;
            margin-bottom: 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header h3 {
            margin: 0;
            color: #333;
        }
        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .form-title {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
            color: #333;
        }
        .form-label {
            font-weight: 500;
            color: #555;
        }
        .form-control {
            border-radius: 0.375rem;
            border: 1px solid #ced4da;
            box-shadow: inset 0 1px 2px rgba(0,0,0,0.075);
            padding: 10px;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .btn-submit {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
            border-radius: 0.375rem;
            font-weight: 600;
            padding: 10px 20px;
        }
        .btn-submit:hover {
            background-color: #0056b3;
            border-color: #004d99;
        }
        .alert {
            border-radius: 0.375rem;
            padding: 15px;
            margin-bottom: 1.5rem;
            font-size: 16px;
        }
        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            border: 1px solid #e1e5e8;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        .card-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card-header {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #e1e5e8;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }
        .text-muted {
            color: #6c757d !important;
        }
        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
        .mb-3 {
            margin-bottom: 1rem !important;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="header">
            <h3 >Student Registration System</h3>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="form-container">
                    <div class="form-title">Registration Form</div>

                    @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="/add-student" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required>
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="form-label">Phone:</label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter Your PhoneNo" >
                        </div>

                        <div class="form-group">
                            <label for="address" class="form-label">Address:</label>
                            <textarea class="form-control" name="address" id="address" rows="3" placeholder="Enter Your Address" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="gender" class="form-label">Gender:</label>
                            <select class="form-control p-2" name="gender" id="gender" required>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="department" class="form-label">Department:</label>
                            <input type="text" class="form-control" name="department" id="department" placeholder="Enter Your Department" required>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="parttime" id="parttime" value="1">
                            <label class="form-check-label" for="parttime">Part-time Student</label>
                        </div>

                        <div class="form-group">
                            <label for="joined_date" class="form-label">Joined Date:</label>
                            <input type="date" class="form-control" name="joined_date" id="joined_date" required>
                        </div>

                        <button type="submit" class="btn btn-submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-container">
                    <div class="card-header">Registered Students</div>
                    @if (sizeOf($students))
                        <ul class="list-group">
                            @foreach ($students as $student)
                                <li class="list-group-item">
                                    {{-- {@dd ($student->parttime===1)} --}}

                                   
                                    <div>
                                        <p>Name: {{ $student->name }}</p>
                                        <p>Email: {{ $student->email }}</p>
                                        <p>Phone: {{ $student->phone }}</p>
                                        <p>Address: {{ $student->address }}</p>
                                        <p>Department: {{ $student->department }}</p>
                                        <p>Joined_Date: {{ $student->joined_date}}</p>
                                        <p>Part-time: @if ($student->parttime===1)
                                                        True
                                                        @else
                                                        False
                                                        @endif
                                         </p>
                                    </div>
                                    <form action="{{ route('delete-student', $student->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                                      
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted p-3">No students registered</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
