<div class="table-responsive">
        <table id="studentTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Father's Name</th>
                    <th>DOA</th>
                    <th>Batch</th>
                    <th>Course</th>
                    <th>Contact Number</th>
                    <th>Photo</th> <!-- Photo Column -->
                    <th>Photo Preview</th> <!-- Photo Column -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
               <!-- Blank Row to Add New Student -->
               <tr class="new-row">
                    <td><input type="text" name="student_id" class="editable" data-column="student_id" /></td>
                    <td><input type="text" name="name" class="editable" data-column="name" /></td>
                    <td><input type="text" name="father_name" class="editable" data-column="father_name" /></td>
                    <td><input type="date" name="doa" class="editable" data-column="doa" /></td>
                    <td>
                        <select name="batch" class="editable" data-column="batch">
                            @for($i = 8; $i < 21; $i++) 
                                <option value="{{ $i }}:00">{{ $i }}:00</option>
                            @endfor
                        </select>
                    </td>
                    <td>
                        <select name="course_id" class="editable" data-column="course_id">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->course_title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" name="contact_number" class="editable" data-column="contact_number" /></td>
             
                
    <td>
        <input type="file" name="image" class="image" id="imageInput" />
    </td>
    <td>
        <div id="imagePreviewContainer" style="display: none;">
            <img id="imagePreview" src="" style="width: 100%;" />
        </div>
        <button type="button" id="cropButton" class="btn btn-primary" style="display: none;">Crop & Upload</button>
    </td>

    <!-- Other form fields -->


                    <td><button class="btn btn-success btn-sm add-row">Add</button></td>
                </tr>

                <!-- Existing Rows of Students -->
                @foreach($students as $student)
                <tr>
                    <td><input type="text" name="student_id" class="editable" data-column="student_id" value="{{ $student->student_id }}" readonly /></td>
                    <td><input type="text" name="name" class="editable" data-column="name" value="{{ $student->name }}" /></td>
                    <td><input type="text" name="father_name" class="editable" data-column="father_name" value="{{ $student->father_name }}" /></td>
                    <td><input type="date" name="doa" class="editable" data-column="doa" value="{{ $student->doa }}" /></td>
                    <td>
                        <select name="batch" class="editable" data-column="batch">
                            @for($i = 8; $i < 21; $i++)
                                <option value="{{ $i }}:00" {{ $student->batch == "{$i}:00" ? 'selected' : '' }}>{{ $i }}:00</option>
                            @endfor
                        </select>
                    </td>
                    <td>
                        <select name="course_id" class="editable" data-column="course_id">
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" {{ $student->course_id == $course->id ? 'selected' : '' }}>{{ $course->course_title }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" name="contact_number" class="editable" data-column="contact_number" value="{{ $student->contact_number }}" /></td>
                    <td>
    <input type="file" class="photo-upload" data-student-id="{{ $student->student_id }}" />
</td>
<td>
    <img id="image-preview-{{ $student->student_id }}" class="image-preview" style="display:none; max-width: 100%; height: auto;" />
    <div id="crop-controls-{{ $student->student_id }}" class="crop-controls" style="display:none; margin-top: 10px;">
        <label for="rotation-angle-{{ $student->student_id }}">Rotation Angle:</label>
        <input type="number" id="rotation-angle-{{ $student->student_id}}" class="rotation-angle" placeholder="Enter angle (e.g., 45)" />
        <button type="button" class="rotate-custom" data-student-id="{{ $student->student_id }}">Rotate</button>
        <button type="button" class="crop-button" data-student-id="{{ $student->student_id}}">Crop and Upload</button>
    </div>
</td>
                    <td> <img src="{{ asset('storage/students/' . $student->photo) }}" alt="Photo" class="img-thumbnail" style="width: 50px;" data-student-id="{{ $student->student_id }}" /></td>
                    <td>
                        <button class="btn btn-danger btn-sm remove-row" data-student-id="{{ $student->student_id }}">Remove</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>