<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant To-Do List</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #70A604 0%, #82c341 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            animation: fadeInUp 0.8s ease-out;
        }

        /* Header with Hero Style */
        .header {
            background: linear-gradient(135deg, #DAFACC 0%, #a8edea 100%);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 60px 40px;
            margin-bottom: 40px;
            box-shadow: 0 20px 60px rgba(218, 250, 204, 0.4);
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.8s ease-out;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -30%;
            width: 120%;
            height: 200%;
            background: linear-gradient(45deg, rgba(255,255,255,0.2) 0%, transparent 50%);
            transform: rotate(25deg);
            animation: shimmer 3s ease-in-out infinite;
        }

        .header-content {
            position: relative;
            z-index: 2;
        }

        .header-mascot {
            margin-bottom: 20px;
        }

        .mascot-icon {
            font-size: 3.5rem;
            background: rgba(255,255,255,0.3);
            border-radius: 50%;
            width: 90px;
            height: 90px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            border: 3px solid rgba(255,255,255,0.4);
            animation: bounce 2s ease-in-out infinite;
        }

        .header h1 {
            font-size: 2.8rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 10px;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
            animation: slideInDown 1s ease-out;
        }

        .header p {
            color: #4a5568;
            font-size: 1.2rem;
            font-weight: 300;
            animation: slideInUp 1s ease-out 0.2s both;
        }

        /* Floating Icons */
        .floating-icons {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
        }

        .floating-icon {
            position: absolute;
            font-size: 1.5rem;
            opacity: 0.4;
            animation: float 6s ease-in-out infinite;
        }

        .icon-1 { top: 15%; left: 10%; animation-delay: 0s; }
        .icon-2 { top: 25%; right: 15%; animation-delay: 2s; }
        .icon-3 { bottom: 30%; left: 8%; animation-delay: 4s; }
        .icon-4 { bottom: 20%; right: 12%; animation-delay: 1s; }

        /* Add To-Do Section */
        .add-task-section {
            background: linear-gradient(135deg, #FBE3D4 0%, #ffd3a5 100%);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 35px;
            margin-bottom: 40px;
            box-shadow: 0 15px 40px rgba(251, 227, 212, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 1s ease-out 0.2s both;
        }

        .add-task-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }

        .add-task-section:hover::before {
            left: 100%;
        }

        .add-task-form {
            display: flex;
            flex-direction: column;
            gap: 25px;
            position: relative;
            z-index: 2;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .input-group label {
            font-weight: 600;
            color: #2d3748;
            font-size: 1rem;
        }

        .input-group input,
        .input-group textarea {
            padding: 18px 24px;
            border: 2px solid rgba(255,255,255,0.6);
            border-radius: 16px;
            font-size: 1rem;
            transition: all 0.4s ease;
            background: rgba(255, 255, 255, 0.8);
            resize: none;
            backdrop-filter: blur(10px);
        }

        .input-group input:focus,
        .input-group textarea:focus {
            outline: none;
            border-color: #70A604;
            background: white;
            box-shadow: 0 0 0 4px rgba(112, 166, 4, 0.1);
            transform: translateY(-2px);
        }

        .add-btn {
            padding: 18px 35px;
            background: linear-gradient(135deg, #70A604 0%, #82c341 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(112, 166, 4, 0.3);
            position: relative;
            overflow: hidden;
        }

        .add-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            transition: left 0.6s ease;
        }

        .add-btn:hover::before {
            left: 100%;
        }

        .add-btn:hover {
            transform: translateY(-3px) scale(1.02);
            box-shadow: 0 15px 35px rgba(112, 166, 4, 0.4);
        }

        /* To-Do Lists Section */
        .tasks-section {
            background: linear-gradient(135deg, #DAFACC 0%, #a8edea 100%);
            backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 15px 40px rgba(218, 250, 204, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.3);
            position: relative;
            overflow: hidden;
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        .tasks-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.6s ease;
        }

        .tasks-section:hover::before {
            left: 100%;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 2px solid rgba(255,255,255,0.4);
            position: relative;
            z-index: 2;
        }

        .section-header h2 {
            font-size: 1.8rem;
            color: #2d3748;
            font-weight: 600;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .task-counter {
            background: linear-gradient(135deg, #70A604 0%, #82c341 100%);
            color: white;
            padding: 12px 20px;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            box-shadow: 0 4px 15px rgba(112, 166, 4, 0.3);
            animation: pulse 2s ease-in-out infinite;
        }

        /* To-Do List */
        .task-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
            position: relative;
            z-index: 2;
        }

        .task-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            padding: 25px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 16px;
            border: 2px solid rgba(255, 255, 255, 0.4);
            transition: all 0.4s ease;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .task-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.5), transparent);
            transition: left 0.6s ease;
        }

        .task-item:hover::before {
            left: 100%;
        }

        .task-item:hover {
            background: rgba(255, 255, 255, 0.95);
            transform: translateY(-4px) scale(1.01);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            border-color: rgba(112, 166, 4, 0.3);
        }

        .task-item.completed {
            opacity: 0.75;
            background: rgba(112, 166, 4, 0.1);
            border-color: rgba(112, 166, 4, 0.2);
        }

        .task-item.completed .task-content h3 {
            text-decoration: line-through;
            color: #718096;
        }

        .task-item.completed .task-content p {
            color: #a0aec0;
        }

        /* Custom Checkbox */
        .task-checkbox {
            position: relative;
            width: 28px;
            height: 28px;
            margin-top: 2px;
        }

        .task-checkbox input {
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            width: 28px;
            height: 28px;
            background: white;
            border: 3px solid #e2e8f0;
            border-radius: 8px;
            transition: all 0.4s ease;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .task-checkbox input:checked + .checkmark {
            background: linear-gradient(135deg, #70A604 0%, #82c341 100%);
            border-color: transparent;
            transform: scale(1.1);
        }

        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }

        .task-checkbox input:checked + .checkmark:after {
            display: block;
            left: 8px;
            top: 4px;
            width: 7px;
            height: 12px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
        }

        /* To-Do Content */
        .task-content {
            flex: 1;
        }

        .task-content h3 {
            font-size: 1.2rem;
            color: #2d3748;
            margin-bottom: 8px;
            font-weight: 600;
            text-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .task-content p {
            color: #4a5568;
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Delete Button */
        .delete-btn {
            background: linear-gradient(135deg, #FBE3D4 0%, #ffd3a5 100%);
            border: 2px solid rgba(255,255,255,0.4);
            color: #e53e3e;
            font-size: 1.4rem;
            cursor: pointer;
            padding: 8px;
            border-radius: 12px;
            transition: all 0.4s ease;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
        }

        .delete-btn:hover {
            color: #c53030;
            background: linear-gradient(135deg, #fed7d7 0%, #feb2b2 100%);
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(229, 62, 62, 0.3);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #4a5568;
        }

        .empty-state .emoji {
            font-size: 5rem;
            margin-bottom: 25px;
            opacity: 0.6;
            animation: bounce 2s ease-in-out infinite;
        }

        .empty-state h3 {
            font-size: 1.4rem;
            margin-bottom: 15px;
            font-weight: 500;
            color: #2d3748;
        }

        .empty-state p {
            font-size: 1rem;
            opacity: 0.8;
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(40px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideInDown {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(10deg); }
        }

        @keyframes shimmer {
            0%, 100% { opacity: 0.1; }
            50% { opacity: 0.3; }
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .header {
                padding: 40px 25px;
                margin-bottom: 30px;
            }

            .header h1 {
                font-size: 2.2rem;
            }

            .header p {
                font-size: 1.1rem;
            }

            .mascot-icon {
                width: 70px;
                height: 70px;
                font-size: 2.8rem;
            }

            .add-task-section,
            .tasks-section {
                padding: 25px;
            }

            .section-header {
                flex-direction: column;
                gap: 15px;
                align-items: flex-start;
            }

            .task-item {
                padding: 20px;
            }

            .floating-icon {
                font-size: 1.2rem;
            }
        }

        @media (max-width: 480px) {
            .header h1 {
                font-size: 1.9rem;
            }

            .header p {
                font-size: 1rem;
            }

            .mascot-icon {
                width: 60px;
                height: 60px;
                font-size: 2.4rem;
            }

            .task-item {
                padding: 15px;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="floating-icons">
                <div class="floating-icon icon-1">📋</div>
                <div class="floating-icon icon-2">✅</div>
                <div class="floating-icon icon-3">📝</div>
                <div class="floating-icon icon-4">📄</div>
            </div>
            <div class="header-content">
                <div class="header-mascot">
                    <div class="mascot-icon">📄</div>
                </div>
                <h1>My To-Do Lists</h1>
                <p>Stay organized and productive with your elegant to-do list manager</p>
            </div>
        </div>

        <!-- Add To-Do Section -->
        <div class="add-task-section">
            <form class="add-task-form" id="taskForm">
                <div class="input-group">
                    <label for="taskTitle">To-Do Title</label>
                    <input type="text" id="taskTitle" placeholder="Enter your to-do item..." required>
                </div>
                <div class="input-group">
                    <label for="taskDescription">Description</label>
                    <textarea id="taskDescription" rows="3" placeholder="Add a description (optional)..."></textarea>
                </div>
                <button type="submit" class="add-btn">Add To-Do</button>
            </form>
        </div>

        <!-- To-Do Lists Section -->
        <div class="tasks-section">
            <div class="section-header">
                <h2>Your To-Do Lists</h2>
                <div class="task-counter">
                    <span id="taskCount">0</span> to-do items
                </div>
            </div>

            <div class="task-list" id="taskList">
                <!-- Empty State -->
                <div class="empty-state" id="emptyState">
                    <div class="emoji">📄</div>
                    <h3>No to-do items yet</h3>
                    <p>Add your first to-do item above to get started</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        let tasks = [];
        let taskIdCounter = 1;

        // DOM Elements
        const taskForm = document.getElementById('taskForm');
        const taskTitleInput = document.getElementById('taskTitle');
        const taskDescriptionInput = document.getElementById('taskDescription');
        const taskList = document.getElementById('taskList');
        const taskCounter = document.getElementById('taskCount');
        const emptyState = document.getElementById('emptyState');

        // Add To-Do
        taskForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const title = taskTitleInput.value.trim();
            const description = taskDescriptionInput.value.trim();
            
            if (title) {
                const newTask = {
                    id: taskIdCounter++,
                    title: title,
                    description: description,
                    completed: false
                };
                
                tasks.push(newTask);
                renderTasks();
                
                // Reset form
                taskTitleInput.value = '';
                taskDescriptionInput.value = '';
                taskTitleInput.focus();
            }
        });

        // Render To-Do Lists
        function renderTasks() {
            taskList.innerHTML = '';
            
            if (tasks.length === 0) {
                taskList.appendChild(emptyState);
            } else {
                tasks.forEach(task => {
                    const taskItem = createTaskElement(task);
                    taskList.appendChild(taskItem);
                });
            }
            
            updateTaskCounter();
        }

        // Create To-Do Element
        function createTaskElement(task) {
            const taskItem = document.createElement('div');
            taskItem.className = `task-item ${task.completed ? 'completed' : ''}`;
            
            taskItem.innerHTML = `
                <div class="task-checkbox">
                    <input type="checkbox" ${task.completed ? 'checked' : ''} 
                           onchange="toggleTask(${task.id})">
                    <span class="checkmark"></span>
                </div>
                <div class="task-content">
                    <h3>${task.title}</h3>
                    ${task.description ? `<p>${task.description}</p>` : ''}
                </div>
                <button class="delete-btn" onclick="deleteTask(${task.id})">
                    ×
                </button>
            `;
            
            return taskItem;
        }

        // Toggle To-Do Completion
        function toggleTask(taskId) {
            const task = tasks.find(t => t.id === taskId);
            if (task) {
                task.completed = !task.completed;
                renderTasks();
            }
        }

        // Delete To-Do
        function deleteTask(taskId) {
            tasks = tasks.filter(t => t.id !== taskId);
            renderTasks();
        }

        // Update To-Do Counter
        function updateTaskCounter() {
            taskCounter.textContent = tasks.length;
        }

        // Initialize
        renderTasks();
        taskTitleInput.focus();
    </script>
</body>
</html>