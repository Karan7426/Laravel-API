<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Tag(
 *     name="Products",
 *     description="API Endpoints of Products"
 * )
 */
class ProductController extends Controller
{
    /**
     * Add a new product to store
     *
     * @OA\GET(
     *     path="/api/products",
     *     tags={"Products"},
     *     operationId="index",
     *       
     *       @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number for pagination",
     *         required=false,
     *         explode=true,
     *          @OA\Schema(
     *             type="integer",
     *             example=1
     *         )
     *     ),
     *      @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         description="Number of items per page for pagination",
     *         required=false,
     *         @OA\Schema(
     *             type="integer",
     *             example=10
     *         )
     *     ),
     *       @OA\Parameter(
     *         name="sort_by",
     *         in="query",
     *         description="Field to sort by",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *             example="price"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="sort_order",
     *         in="query",
     *         description="Sort order (asc or desc)",
     *         required=false,
     *         @OA\Schema(
     *             type="string",
     *             enum={"asc", "desc"},
     *             example="asc"
     *         )
     *     ),
     *    @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     )
     * )
     */
    
   public function index()
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            return response()->json(['message' => 'No products found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['products' => $products, 'message' => 'Products retrieved successfully'], Response::HTTP_OK);
    }

     
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation error', 'errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $product = Product::create($request->all());

        return response()->json(['product' => $product, 'message' => 'Product created successfully'], Response::HTTP_CREATED);
    }

     
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['product' => $product, 'message' => 'Product retrieved successfully'], Response::HTTP_OK);
    }

     
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string|max:1000',
            'price' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'Validation error', 'errors' => $validator->errors()], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        $product->update($request->all());

        return response()->json(['product' => $product, 'message' => 'Product updated successfully'], Response::HTTP_OK);
    }

    
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], Response::HTTP_NO_CONTENT);
    }
}
