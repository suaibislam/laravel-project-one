<!-- <?php
// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Models\Content;

// class AdminContentController extends Controller
// {
    // // Show the admin upload form with existing content
    // public function index()
    // {
    //     $contents = Content::all();
    //     return view('admin.dashboard', compact('contents'));
    // }

    // // Store uploaded content
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'type' => 'required|string',
    //         'file' => 'nullable|file|mimes:jpg,png,jpeg',
    //         'content' => 'nullable|string|max:5000',
    //     ]);

    //     $data = ['type' => $request->type];

    //     if ($request->hasFile('file')) {
    //         $path = $request->file('file')->store('uploads', 'public');
    //         $data['path'] = $path;
    //     }

    //     if ($request->filled('content')) {
    //         $data['content'] = $request->content;
    //     }

    //     Content::create($data);

    //     return redirect()->back()->with('success', 'Content uploaded successfully!');
    // }
// } 
