<?php

class pay {
        private ?int $id;
        private ?string $typec;
        private ?string $cdnumber;
        private ?string $drcode;
        private ?string $bkcode;
        private ?string $securitycode;
        private ?DateTime $datee;
    
        // Constructor
        public function __construct(
            ?int $id,
            ?string $typec,
            ?string $cdnumber,
            ?string $drcode,
            ?string $bkcode,
            ?string $securitycode,
            ?DateTime $datee
        ) {
            $this->id = $id;
            $this->typec = $typec;
            $this->cdnumber = $cdnumber;
            $this->drcode = $drcode;
            $this->bkcode = $bkcode;
            $this->securitycode = $securitycode;
            $this->datee = $datee;
        }
    // Getters and Setters

    public function getId(): ?int {
        return $this->id;
    }
    
    public function setId(?int $id): void {
        $this->id = $id;
    }
    
    public function getTypec(): ?string {
        return $this->typec;
    }
    
    public function setTypec(?string $typec): void {
        $this->typec = $typec;
    }
    
    public function getCdnumber(): ?string {
        return $this->cdnumber;
    }
    
    public function setCdnumber(?string $cdnumber): void {
        $this->cdnumber = $cdnumber;
    }
    
    public function getDrcode(): ?string {
        return $this->drcode;
    }
    
    public function setDrcode(?string $drcode): void {
        $this->drcode = $drcode;
    }
    
    public function getBkcode(): ?string {
        return $this->bkcode;
    }
    
    public function setBkcode(?string $bkcode): void {
        $this->bkcode = $bkcode;
    }
    
    public function getSecuritycode(): ?string {
        return $this->securitycode;
    }
    
    public function setSecuritycode(?string $securitycode): void {
        $this->securitycode = $securitycode;
    }
    
    public function getDatee(): ?DateTime {
        return $this->datee;
    }
    
    public function setDatee(?DateTime $datee): void {
        $this->datee = $datee;
    }
}  


class comments {
    private ?int $id;
    private ?int $stryid;
    private ?string $user;
    private ?string $message_text;
    private ?string $voice_file_path;
    private ?string $gif_file_path;
    private ?string $message_type;
    private ?DateTime $dates;
    private ?float $likes;
    

    // Constructor
    public function __construct(?int $id, ?int $stryid, ?string $user, ?string $message_text, ?string $voice_file_path, ?string $gif_file_path,?string $message_type, ?DateTime $dates,?float $likes) {
        $this->id = $id;
        $this->stryid = $stryid;
        $this->user = $user;
        $this->message_text = $message_text;
        $this->voice_file_path = $voice_file_path;
        $this->gif_file_path = $gif_file_path;
        $this->message_type = $message_type;
        $this->dates = $dates;
        $this->likes = $likes;
    }

    // Getters and Setters

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getstryid(): ?int {
        return $this->stryid;
    }

    public function setstryid(?int $stryid): void {
        $this->stryid = $stryid;
    }
    
    public function getuser(): string {
        return $this->user;
    }

    public function setuser(string $user): void {
        $this->user = $user;
    }

    public function getmessage_text(): ?string {
        return $this->message_text;
    }

    public function setmessage_text(?string $message_text): void {
        $this->message_text = $message_text;
    }
    public function getvoice_file_path(): ?string {
        return $this->voice_file_path;
    }

    public function setvoice_file_path(?string $voice_file_path): void {
        $this->voice_file_path = $voice_file_path;
    }
    public function getgif_file_path(): ?string {
        return $this->gif_file_path;
    }

    public function setgif_file_path(?string $gif_file_path): void {
        $this->gif_file_path= $gif_file_path;
    }
    public function getmessage_type(): ?string {
        return $this->message_type;
    }

    public function setmessage_type(?string $message_type): void {
        $this->message_type= $message_type;
    }

    public function getdates(): ?DateTime {
        return $this->dates;
    }

    public function setdates(?DateTime $dates): void {
        $this->dates = $dates;
    }



    public function getlikes(): ?float {
        return $this->likes;
    }

    public function setlikes(float $likes): void {
        $this->likes = $likes;
    }

}




class Report {
    private ?int $id; // Report ID
    private ?int $comment_id; // ID of the comment being reported
    private ?string $reported_by; // reported_by who submitted the report
    private ?string $report_reason; // Reason for reporting
    private ?DateTime $report_date; // report_date the report was submitted

    // Constructor
    public function __construct(
        ?int $id,
        ?int $commentId,
        ?string $reported_by,
        ?string $report_reason,
        ?report_dateTime $report_date,
    ) {
        $this->id = $id;
        $this->commentId = $commentId;
        $this->reported_by = $reported_by;
        $this->report_reason = $report_reason;
        $this->report_date = $report_date;
    }

    // Getters and Setters

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): void {
        $this->id = $id;
    }

    public function getCommentId(): ?int {
        return $this->commentId;
    }

    public function setCommentId(?int $commentId): void {
        $this->commentId = $commentId;
    }

    public function getreported_by(): ?string {
        return $this->reported_by;
    }

    public function setreported_by(?string $reported_by): void {
        $this->reported_by = $reported_by;
    }

    public function getreport_reason(): ?string {
        return $this->report_reason;
    }

    public function setreport_reason(?string $report_reason): void {
        $this->report_reason = $report_reason;
    }

    public function getreport_date(): ?report_dateTime {
        return $this->report_date;
    }

    public function setreport_date(?report_dateTime $report_date): void {
        $this->report_date = $report_date;
    }

}


?>
