<?php
use Illuminate\Http\UploadedFile;
class ApiTest extends TestCase
{
    /**
     *  Test upload video and return getId3 in json format
     */
    public function testVideoWithID3()
    {
        $videoName = 'test-video.mp4';
        $videoPath = "public/assets/videos/" . $videoName;

        // Pathname / ClientOriginalName / ClientMimeType / ClientSize / Error
        $file = new UploadedFile($videoPath, $videoName, 'video/mp4', null, null, true);

        //  get the full  Illuminate\Http\Response object
        $response = $this->call('POST', 'api/v1/video', ['video' => $file]);

        // check assertions
        $this->assertEquals(200, $response->status());

        // JSON decode
        json_decode($response->content());
    }
    /**
     *  Test HTTP POST on video end point
     */
    public function testBareRequest()
    {
        $response = $this->call('POST', '/api/v1/video');

        // Unsupported Media Type Return
        $this->assertEquals(422, $response->status());
    }
}