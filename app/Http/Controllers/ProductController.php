use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Show form to add a new product
    public function create()
    {
        return view('products.create');
    }

    // Store the product
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'stock_quantity' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'stock_quantity' => $request->stock_quantity,
            'image_path' => $imagePath,
        ]);

        return redirect()->route('products.index')->with('success', 'Product added!');
    }

    // Show all products (for customers)
    public function index()
    {
        $products = Product::latest()->get();
        return view('products.index', compact('products'));
    }
}
