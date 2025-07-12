<!-- Hiển thị tổng số câu question đã được gửi lên -->
<p><?=$totalQuestion?> questions have been submitted to the Internet question Database.</p>

<!-- Bắt đầu vòng lặp để hiển thị từng question trong danh sách $questions -->
<?php foreach ($questions as $question) : ?>
    <blockquote>
        <?php 
        // Hiển thị nội dung question, đảm bảo an toàn bằng cách mã hóa HTML (tránh XSS)
        echo htmlspecialchars($question['questiontext'], ENT_QUOTES, 'UTF-8') . ' ';
        
        // Chuyển đổi ngày question được gửi sang định dạng dễ đọc, ví dụ: Monday, 30th Jun 2025
        $display_date = date('l, jS M Y', strtotime($question['questiondate']));
        
        // Hiển thị ngày, tên người gửi, email và tên danh mục. Tất cả đều được mã hóa an toàn.
        echo htmlspecialchars($display_date, ENT_QUOTES, 'UTF-8') . ' by ' . 
             htmlspecialchars($question['auname'], ENT_QUOTES, 'UTF-8') . " (" . 
             htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8') . ")" . ' in ' . 
             htmlspecialchars($question['catename'], ENT_QUOTES, 'UTF-8');
        ?>
        
        <br>
        
        <!-- Hiển thị hình ảnh kèm theo question (nếu có), chiều rộng giới hạn 100px -->
        <img src="images/<?= htmlspecialchars($question['image'], ENT_QUOTES, 'UTF-8') ?>" alt="question Image" width="100">
        
        <!-- Link để chuyển đến trang sửa question, truyền ID question qua URL -->
        <a href="editquestion.php?id=<?=$question['id']?>">Edit</a>
        
        <!-- Form để xóa question. Gửi ID question theo phương thức POST để xử lý an toàn hơn -->
        <form action="deletequestion.php" method="post">
            <!-- Trường ẩn chứa ID của question, sẽ gửi đi khi form được submit -->
            <input type="hidden" name="id" value="<?= $question['id'] ?>">
            
            <!-- Nút xóa -->
            <input type="submit" value="Delete">
        </form>
    </blockquote>
<?php endforeach; ?>
