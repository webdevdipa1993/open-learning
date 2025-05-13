Action Plan
https://chatgpt.com/canvas/shared/67d59999ade0819198bfa1b2420b77a1

--- 

# Dated: 13-May-2025
# Task 1: 
* read the first route of student.php
* Admission Form
* copy page title & breadcrumb and paste in all route of admin.php and do change accordingly 

# Task 2: 
---

## 📌 Student Action Plan and Feature Overview

### 1️⃣ Admission + Enrollment
### Admission + Enrollment(class/stream/section/course (Grade) Assignment) [refer Point 5]
> **URL(s)**: `/student/admission`, `/student/enrollments`

#### 🧾 Form Fields:

* Full Name, Email, Phone, Date of Birth
* Address, Guardian Name + Contact
* Class / Grade (dropdown), Stream, Section
* Course (multi-select), Previous School Name
* Admission Date

#### 📋 Table Columns:

* Student Name, Class/Stream/Section
* Status (Pending/Approved)

#### 🛠 Action Buttons:

* View, Edit, Delete, Assign Class

#### 📝 Notes:

* Class, Stream, and Section dropdowns are relational.
* Combine Admission and Enrollment if needed.

---

### 2️⃣ View Subjects
### See Subjects involved in respective class/stream/section/course (Grade)
### can see subject wise curriculum(s)/Assignment(s)

> **URL**: `/student/subjects`

#### 📋 Table Columns:

* Subject Name, Subject Code, Teacher Name
* Curriculum Link, Assignments Link

#### 🛠 Action Buttons:

* View Curriculum, View Assignments

#### 📝 Notes:

* Subjects loaded based on student's assigned class/stream/section.

---

### 3️⃣ Curriculum Overview
### See curriculum of respective class/stream/section/course (Grade)
### per day classes

> **URL**: `/student/curriculum`

#### 📋 Table Columns:

* Date, Subject, Topic, Curriculum Type
* Attend Button, Assignments

#### 🛠 Action Buttons:

* View Curriculum, Attend Class

#### 📝 Notes:

* Attendance is marked by clicking “Attend”.
* Filterable by date/subject.

---

### 3.1️⃣ Curriculum Attendance
### Can Attend curriculum 
### which will be calculated as attendence]

> **URL (POST)**: `/student/attendance/submit`

#### 🛠 Action:

* Mark attendance with one click per curriculum.

#### 📝 Notes:

* System prevents multiple attendances for the same class.

---

### 3.2️⃣ Assignments
### can see & submit Assignment(s) in curriculum 
### single / multiple Assignment(s) could be associated with each curriculum (per day classes)
### student's may/may n't submit (not mandatory) 
### Teacher's will verify 
### Student's can see the Teacher's Corrections

> **URL**: `/student/assignments`

#### 📋 Table Columns:

* Assignment Title, Subject, Curriculum Topic
* Submission Status, Teacher Remarks, File Link

#### 🧾 Form Fields (Submission):

* File Upload (PDF/Doc/Image)
* Optional Notes to Teacher

#### 🛠 Action Buttons:

* View Assignment, Submit, View Correction

#### 📝 Notes:

* Multiple assignments may be associated with each curriculum session.

---

### 4️⃣ Exams
### can see & submit exams in respective class/stream/section/course (Grade); 
### will see dates| see papers on exam start| will able to submit exam on time
### exam 's start & end date & time will be set by Admin
### single / multiple exam papers for each exam can/will be prepared by multiple Teachers & Admins 
### Approval will be done by Admin 
### there will be single Approved paper will be each exam 

> **URL**: `/student/exams`
> **Exam Start URL**: `/student/exams/{exam_id}/start`

#### 📋 Table Columns:

* Exam Name, Subject, Start Date-Time, End Date-Time
* Status (Upcoming/Ongoing/Ended)

#### 🛠 Action Buttons:

* View Schedule, Start Exam, Submit Exam

#### 📝 Notes:

* Only one Admin-approved paper per exam.
* Time-bound start and submission handling.

---

### 5️⃣ Profile, Documents, Payments, and Support
### Profile + Self Documents + Payment + Support Mail & Chat
### Simple Student's all details gathering form to keep information [like KYC]
### Self Documents Section is just see & submit of Pdf/Docs/Images
### Support Mail & Chat : History & Screenshoot of mail + chat + text 
### Support Mail & Chat is any form of comunication mostly related to payments
### Payment for now just have pay button Single click

#### 🧍‍♂️ Profile

> **URL**: `/student/profile`

* Fields: Name, Email, Phone, Address, DOB, Gender, Guardian, Class Info

---

#### 📁 Self Documents

> **URL**: `/student/documents`

##### 🧾 Form Fields:

* Document Type (dropdown), Upload File, Description

##### 📋 Table Columns:

* Document Type, File Link, Uploaded At, Status

---

#### 💰 Payments

> **URL**: `/student/payments`

##### 📋 Table Columns:

* Payment Name, Amount, Due Date, Paid On, Status

##### 🛠 Action Buttons:

* Pay Now (Just Pay for Now)

---

#### 💬 Support Mail & Chat

> **URL**: `/student/support`
> **Chat View URL**: `/student/support/{ticket_id}`

* Used mainly for payment-related issues.
* Support chat includes timestamped message history with attachments.

##### 🧾 Form Fields:

* Subject, Message, Screenshot Upload (optional)

##### 📋 Table Columns:

* Ticket ID, Subject, Date, Status

##### 🛠 Action:

* View Chat History
