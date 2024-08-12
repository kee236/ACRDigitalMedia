import os
import chardet

def find_files(search_string, start_dir, encodings=('utf-8', 'latin-1', 'cp1252')):
  """
  Searches for files containing the search_string in the start_dir directory and subdirectories,
  trying multiple encodings to handle potential encoding variations.

  Args:
      search_string: The string to search for in filenames and file content.
      start_dir: The starting directory to search from.
      encodings: A tuple of encoding formats to try (default: utf-8, latin-1, cp1252).

  Returns:
      A list of full paths to files containing the search_string.
  """
  matches = []
  for root, dirs, files in os.walk(start_dir):
    for filename in files:
      decoded = False
      for encoding in encodings:
        try:
          with open(os.path.join(root, filename), encoding=encoding) as f:
            if search_string in filename or search_string in f.read():
              matches.append(os.path.join(root, filename))
              decoded = True
              break  # Exit the inner loop if a match is found with this encoding
        except UnicodeDecodeError:
          pass  # Try the next encoding in the list

      # If no encoding worked, log the filename for further investigation (optional)
      if not decoded:
        print(f"Failed to decode {os.path.join(root, filename)} with any provided encodings.")

  return matches

def delete_file(filepath):
  """
  Deletes a file without prompting for confirmation.

  Args:
      filepath: The full path to the file to be deleted.
  """
  os.remove(filepath)
  print(f"{filepath} deleted.")

def main():
  """
  Gets user input for search string and uses current directory by default, then finds and deletes files.
  """
  search_string = input("Enter the text to search for: ")
  start_dir = os.getcwd()  # Get the current working directory
  
  files = find_files(search_string, start_dir)
  
  if not files:
    print("No files found containing the search string.")
  else:
    print(f"Found {len(files)} files:")
    all_delete = False
    for filepath in files:
      print(filepath)
      if all_delete:
        delete_file(filepath)
      else:
        response = input(f"Delete {filepath}? (y/n/all): ").lower()
        if response == 'y':
          delete_file(filepath)
        elif response == 'n':
          pass  # Skip this file
        elif response == 'all':
          all_delete = True  # Flag for subsequent files, avoid further prompts

if __name__ == "__main__":
  main()
