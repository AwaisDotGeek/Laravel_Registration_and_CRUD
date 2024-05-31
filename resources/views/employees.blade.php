<!-- resources/views/employees.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-blue-50">
    <div class="container mx-auto py-8 lg:px-20">
        <div class="flex justify-between mb-4">
            <div class="flex space-x-4">
                <input type="text" placeholder="Search employees..." class="border border-blue-300 px-4 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Search</button>
            </div>
            <a href="{{ route('employees.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Add Employee</a>
        </div>
        <table class="w-full border-collapse border border-blue-300">
            <thead>
                <tr>
                    <th class="border border-blue-300 px-4 py-2">Name</th>
                    <th class="border border-blue-300 px-4 py-2">Email</th>
                    <th class="border border-blue-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td class="border border-blue-300 px-4 py-2">{{ $employee->name }}</td>
                    <td class="border border-blue-300 px-4 py-2">{{ $employee->email }}</td>
                    <td class="border border-blue-300 px-4 py-2">
                        <a href="{{ route('employees.edit', $employee->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">Modify</a>
                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
