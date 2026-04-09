<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Task Form</title>
  <link rel="stylesheet" href="/css/task.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <div>
        @if ($errors->any())
            <div class="errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="err">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="success">{{ session('success') }}</div>
        @endif

    </div>



    <div class="card">
        <center><h2>Create Task</h2></center> 
        <br>
        <form action="{{ url('/tasks/store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="form-group">
                    <label>Task Title:</label>
                    <input type="text" name="title" value="" placeholder="Enter Title" required>
                </div>
                <div class="form-group">
                    <label>Total Time: (min)</label>
                    <input type="text" name="time" value="" id="total-time">
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label>Frequency:</label>
                    <select name="frequency_type_id">
                        @foreach($Freqency as $row)
                        <option value="{{  $row->id }}">{{  $row->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="card-sec">
                <h4>Subtasks</h4>
                <button type="button" id="add_subtask" style="margin-top: 24px;">Add Subtask</button>
            </div>

        
            <div id="subtasks-container">
                <div class="row subtask-row">
                    <div class="form-group">
                        <label>Subtask Title:</label>
                        <input type="text" name="subtasks[0][title]" value="" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <label>Time:</label>
                        <input type="text" class="subtask-time" name="subtasks[0][time]" value="" placeholder="Enter Time in min" required>
                    </div>
                    <button type="button" class="remove_subtask btn danger">Remove</button>
                </div>
            </div>

            <button type="submit" class="btn info">Save</button>
        </form>
    </div>
      
    <div class="summary-section">
        <h2>Task Summary</h2>
        <div style="display: flex;justify-content: start;gap: 50px;align-items: start;">
            <p>No of Tasks: {{ $summary['total_tasks'] }}</p>
            <p>Total Time: {{ $summary['Total_estimated_time'] }} Min</p>
        </div>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>Frequency</th>
                    <th>Tasks</th>
                    <th>Total Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($summary['frequencies'] as $frequencyName => $data)
                    <tr>
                        <td>{{ $frequencyName }}</td>
                        <td>
                             @if(!empty($data['tasks']) && count($data['tasks']) > 0)
                                @foreach($data['tasks'] as $task)
                                    {{ $task['name'] }}@if(!$loop->last), @endif
                                @endforeach
                            @else
                                -
                            @endif
                        </td>
                        <td>{{ $data['total_time'] }} Min</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="/js/task.js"></script>
</body>
</html>